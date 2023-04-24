<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\nilam;
use App\Models\Booking;
use App\Models\rankings;
use App\Models\announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }//end method

    public function Dashboard()
    {
        //count
        $nilam = nilam::select()->get();
        $count = 0;
        foreach ($nilam as $nilams) {
            if($nilams->StudentID == Auth::guard('student')->user()->id && $nilams->status == "Approved"){
                $count = $count + 1;
            }
        }
        $rank = rankings::find(Auth::guard('student')->user()->id);
        $rank->total_nilam = $count;
        $rank->update();

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
        
        $announcement = announcement::latest()->paginate(5);
        $ranking = rankings::select()->orderBy('rank','ASC')->paginate(10);
        $booking = Booking::all();
        $date = Booking::select('bookingdate')->orderBy('bookingdate','ASC')->get();
        // $status = Booking::select('status')->get();
        $filtered_date = array();
        foreach ($date as $dates) {
            if (!in_array($dates, $filtered_date)) {
                $filtered_date[] = $dates;
            }
        }
        // dd($status);
        $new_filtered_date = array();
        $now = Carbon::today()->format("Y-m-d");

        foreach($filtered_date as $dates){
            if($dates->bookingdate >= $now){
                $new_filtered_date[] = $dates;
            }
        }
        $countPending = 0;
        $countApproved = 0;
        $countRejected = 0;
        // dd($status);
        foreach ($booking as $status){
            if($status->status == "Pending" && $status->bookingdate >= $now){
                $countPending++;
            }else if($status->status == "Approved"){
                $countApproved++;
            }else{
                $countRejected++;
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

        foreach($booking as $books){
            $value = Carbon::parse($books->bookingdate)->format('m');
            
            if($books->status == "Approved"){
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
        
        $book = Booking::select()->get();
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

        return view('admin.index', compact('announcement','booking','date', 'rooms', 'months' ,'countPending','countApproved','countRejected','ranking'))->with(request()->input('page'));

    }
    public function Login(Request $request)
    {
        // dd($request->all());
        $check = $request->all();

        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' =>$check['password']])) 
        {
            return redirect()->route('admin.dashboard')->with('success','Admin Login Successfully');
        }else
        {
            return back()->with('error','Invalide Email Or Password');
        }
    }

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('success','Logout Successfully');
    }

    public function AdminRegister()
    {
        return view('admin.admin_register');
    }

    public function AdminRegisterCreate(Request $request)
    {
        $email = $request->email;
        $username = $request->name;
        $admin = Admin::all();
        
        foreach($admin as $admins){
            if($request->email == $admins->email){
                return redirect()->route('admin.register',compact('username','email'))->with('error','The email is already exist, Please used another email.');
            }
        }

        if($request->password != $request->password_comfirmation){
            // $email = $request->email;
            
            return redirect()->route('admin.register',compact('username','email'))->with('error','The pasword is not match');
        }
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.register')->with('success','Admin Created Successfully');
    }
}
