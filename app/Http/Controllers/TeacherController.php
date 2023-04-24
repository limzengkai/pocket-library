<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\nilam;
use App\Models\Booking;
use App\Models\Teacher;
use App\Models\rankings;
use App\Models\announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function Index()
    {
        return view('Teacher.teacher_login');
    }

    public function TeacherDashboard()
    {
        //count
        $nilam = nilam::select()->get();
        $count = 0;
        $id = 1;
        $test = 0;
        $total = rankings::all()->count();
        for($id =1; $id <$total; $id++){
            foreach ($nilam as $nilams) {
                if($nilams->StudentID == $id && $nilams->status == "Approved"){
                    $count = $count + 1;
                    $test=1;
                }
            }
            if($test == 1){
                $rank1 = rankings::find($id);
                $rank1->total_nilam = $count;
                $rank1->update();
            }
            $count = 0;
            $test = 0;
        }


        //Arranged new ranking
        $count = 1;
        $rank = rankings::select()->orderBy('total_nilam','DESC')->orderBy('created_at','ASC')->orderBy('id','ASC')->get();

        foreach ($rank as $ranks) {
            $rankingupdate = rankings::find($ranks->id);
            $rankingupdate->rank = $count;
            // $ranks->rank = $count;
            $count = $count+1;
            $rankingupdate->update();
        }

        $ranking = rankings::select()->orderBy('rank','ASC')->paginate(10);
        $book = Booking::select()->where('name', Auth::guard('teacher')->user()->name)->get();
        $announcement = announcement::latest()->paginate(5);
        $nowMonth = Carbon::today()->format("m");
        $booking = Booking::all();
        $nilam = nilam::select()->get();

        $date = Booking::select('bookingdate')->orderBy('bookingdate','ASC')->get();
        $filtered_date = array();
        foreach ($date as $dates) {
            if (!in_array($dates, $filtered_date)) {
                $filtered_date[] = $dates;
            }
        }
        
        $countBooking = 0;
        $countPending = 0;
        $countApproved = 0;
        foreach($book as $books){

            $datebook = Carbon::parse($books->bookingdate)->format('m');
            // dd($datebook);
            
            if($datebook == $nowMonth){
                if($books->status == "Approved"){
                    $countBooking = $countBooking + 1;
                }
            }
        }

        foreach($nilam as $nilams){
            if($nilams->status == "Pending"){
                $countPending = $countPending + 1;
            }else if($nilams->status == "Approved"){
                $countApproved = $countApproved + 1;
            }
        }

        $new_filtered_date = array();
        $now = Carbon::today()->format("Y-m-d");

        foreach($filtered_date as $dates){
            if($dates->bookingdate >= $now){
                $new_filtered_date[] = $dates;
            }
        }
        $date = $new_filtered_date;

        // Student Nilam Submission - line graph
        $countJan = 0;
        $countFeb = 0;
        $countMar = 0;
        $countApr = 0;
        $countMay = 0;
        $countJun = 0;
        $countJul = 0;
        $countAug = 0;
        $countSep = 0;
        $countOct = 0;
        $countNov = 0;
        $countDec = 0;

        foreach($nilam as $nilams){
            $value = Carbon::parse($nilams->created_at)->format('m');
            
            if($nilams->status == "Approved"){
                switch($value){
                    case 1:
                        $countJan++;
                        break;
                    case 2:
                        $countFeb++;
                        break;
                    case 3:
                        $countMar++;
                        break;
                    case 4:
                        $countApr++;
                        break;
                    case 5:
                        $countMay++;
                        break;
                    case 6:
                        $countJun++;
                        break;
                    case 7:
                        $countJul++;
                        break;
                    case 8:
                        $countAug++;
                        break;
                    case 9:
                        $countSep++;
                        break;
                    case 10:
                        $countOct++;
                        break;
                    case 11:
                        $countNov++;
                        break;
                    case 12:
                        $countDec++;
                        break;
                }
            }
        }
        $months = array('Jan' => $countJan, 'Feb' => $countFeb, 'Mar' => $countMar , 'Apr' => $countApr, 'May' => $countMay , 'Jun' => $countJun , 
                        'Jul' => $countJul, 'Aug' => $countAug, 'Sep' => $countSep, 'Oct' => $countOct, 'Nov' => $countNov, 'Dec' => $countDec);

        //Pie Chart 
        
        $countA = 0;
        $countB = 0;
        $countC = 0;

        foreach($book as $books){
            $roomvalue = $books->room;
            if($books->status == "Approved"){
                switch($roomvalue){
                    case 'A':
                        $countA++;
                        break;
                    case 'B':
                        $countB++;
                        break;
                    case 'C':
                        $countC++;
                        break;
                }
            }
        }
        
        $rooms = array('roomA' => $countA, 'roomB' => $countB, 'roomC' => $countC);
        
        return view('teacher.index',compact('announcement','date','booking', 'countBooking', 'countPending', 'countApproved' ,'months', 'rooms','ranking'));
    }

    public function TeacherLogin(Request $request)
    {
        // dd($request->all());
        $check = $request->all();

        if (Auth::guard('teacher')->attempt(['email' => $check['email'], 'password' =>$check['password']])) 
        {
            return redirect()->route('teacher.dashboard')->with('success','Teacher Login Successfully');
        }else
        {
            return back()->with('error','Invalide Email Or Password');
        }
    }

    public function TeacherLogout()
    {
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher_login_form')->with('success','Logout Successfully');
    }

    // public function TeacherForget()
    // {
    //     Auth::guard('teacher')->
    // }

    public function TeacherRegister()
    {
        return view('teacher.teacher_register');
    }

    public function TeacherRegisterCreate(Request $request)
    {
        // dd($request->all());

        $email = $request->email;
        $username = $request->name;
        $teacher = Teacher::all();
        
        foreach($teacher as $teachers){
            if($request->email == $teachers->email){
                return redirect()->route('teacher.register',compact('username','email'))->with('error','The email is already exist, Please used another email.');
            }
        }

        if($request->password != $request->password_comfirmation){
            // $email = $request->email;
            
            return redirect()->route('teacher.register',compact('username','email'))->with('error','The pasword is not match');
        }

        Teacher::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.register')->with('success','Teacher Created Successfully');
    }
}
