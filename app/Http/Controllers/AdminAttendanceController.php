<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('attendances')
            ->orderBy('date',"DESC")
            ->orderBy('timein','DESC')
            ->paginate(10);

        return view('admin.admin_attendance',compact('data'));    
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
            ->paginate(10);

        return view('admin.admin_attendance',compact('data')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()    
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
       
    }
}
