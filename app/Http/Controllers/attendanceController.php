<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;

class attendanceController extends Controller
{
    public function Index()
    {
        $data = DB::table('attendances')
            ->orderBy('date',"DESC")
            ->orderBy('timein','ASC')
            ->paginate(5);
        return view('Teacher.attendance_list',compact('data'));
    }

    public function Qrcode()
    {
        $id=Auth::guard('student')->user()->id;
        return view('Student.qrcode',compact('id'));
    }

    public function show()
    {
        
        $data = DB::table('attendances')
                ->where('date', Carbon::now()->format("Y-m-d"))
                ->orderBy('timein','ASC')
                ->get();

        return view('Teacher.attendance',compact('data'));
    }

    public function StudentIndex()
    {
        $data = DB::table('attendances')
            ->where('student_id', Auth::guard('student')->user()->id)
            ->orderBy('date',"ASC")
            ->orderBy('timein','ASC')
            ->paginate(5);
        
        return view('Student.attendance',compact('data'));
    }

    //Check the existing of data
    public function store(Request $request){
        $check = attendance::where([
            'student_id' => $request->id,
            'date' => Carbon::now()->format("Y-m-d")
        ])->first();

        $data = DB::table('students')->where('id',$request->id)->first();

        if($check){
            return redirect()->route('attendance.show')->with('Failed','Your name already Inside the system');
        }else if(!$data){
            return redirect()->route('attendance.show')->with('Failed','Invalid Qr Code');
        }

        attendance::create([
            'student_id' => $request->id,
            'Name' => $data->name,
            'date' => Carbon::now()->format("Y-m-d"),
            'timein' => Carbon::now()->format('H:i:s')
        ]);

        return redirect()->route('attendance.show')->with('success', 'Welcome, '.$data->name);
    }
    public function search(Request $request)
    {
        if($request->to < $request->from){
            Alert::warning('Warning!!!', 'The todate cannot be smaller than fromdate');

            return redirect()->route('attendance.index');
        }

        $data = DB::table('attendances')
            ->where('date', '>=' , $request->from)
            ->where('date', '<=' , $request->to)
            ->orderBy('date',"DESC")
            ->orderBy('timein','DESC')
            ->paginate(5);

        return view('teacher.attendance_list',compact('data')); 
    }
    public function s_search(Request $request)
    {
        if($request->to < $request->from){
            Alert::warning('Warning!!!', 'The todate cannot be smaller than fromdate');

            return redirect()->route('attendance.index');
        }

        $data = DB::table('attendances')
                ->where('student_id', Auth::guard('student')->user()->id)
                ->where('date', '>=' , $request->from)
                ->where('date', '<=' , $request->to)
                ->orderBy('date',"DESC")
                ->orderBy('timein','DESC')
                ->paginate(5);

        return view('student.attendance',compact('data')); 
    }

}
