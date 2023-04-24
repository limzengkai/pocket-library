<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\nilam;
use App\Models\Student;
use App\Models\rankings;
use App\Models\announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class StudentController extends Controller
{
    public function Index()
    {
        return view('Student.student_login');
    }

    public function StudentDashboard(Request $request)
    {
        //count
        $nilam = nilam::select()->get();
        $count = 0;
        foreach ($nilam as $nilams) {
            if($nilams->StudentID == Auth::guard('student')->user()->id && $nilams->status == "Approved"){
                $count = $count + 1;
            }
        }
        $rank1 = rankings::find(Auth::guard('student')->user()->id);
        $rank1->total_nilam = $count;
        $rank1->update();

        //Arranged new ranking
        $count = 1;
        $rank2 = rankings::select()->orderBy('total_nilam','DESC')->orderBy('created_at','ASC')->orderBy('id','ASC')->get();

        foreach ($rank2 as $ranks) {
            $rankingupdate = rankings::find($ranks->id);
            $rankingupdate->rank = $count;
            // $ranks->rank = $count;
            $count = $count+1;
            $rankingupdate->update();
        }

        $announcement = announcement::latest()->paginate(5);
        $nilam = nilam::select()->where('StudentID', Auth::guard('student')->user()->id)->get();
        $ranking = rankings::select()->orderBy('rank','ASC')->paginate(10);
        $rank = rankings::select()->where('id', Auth::guard('student')->user()->id)->get();
        $total = rankings::all()->count();
// dd($rank);
        $countpending = 0;
        $countApproved = 0;
        $countreject = 0;
        $countranking = 0;
        foreach($nilam as $nilams){
            if($nilams->status == "Pending"){
                $countpending = $countpending + 1;
            }else if($nilams->status == "Approved"){
                $countApproved = $countApproved + 1;
            }else if($nilams->status == "Reject"){
                $countreject = $countreject + 1;
            }
        }
        $now = Carbon::now();
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

        // dd($months['Jan']);  
        return view('student.index',compact('announcement','countpending','countApproved', 'countreject', 'ranking', 'rank' , 'total', 'months'));
    }

    public function StudentLogin(Request $request)
    {
        // dd($request->all());
        $check = $request->all();

        if (Auth::guard('student')->attempt(['email' => $check['email'], 'password' =>$check['password']])) 
        {
            return redirect()->route('student.dashboard')->with('error','Student Login Successfully');
        }else
        {
            return back()->with('error','Invalide Email Or Password');
        }
    }

    public function StudentLogout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student_login_form')->with('error','Logout Successfully');
    }

    public function StudentRegister()
    {
        return view('student.student_register');
    }

    public function StudentRegisterCreate(Request $request)
    {
        // $request->validate([
        //     'password' => ['required', 'confirmed'],
        // ]);
        $email = $request->email;
        $username = $request->name;
        $student = Student::all();
        
        foreach($student as $students){
            if($request->email == $students->email){
                return redirect()->route('student.register',compact('username','email'))->with('error','The email is already exist, Please used another email.');
            }
        }

        if($request->password != $request->password_comfirmation){
            // $email = $request->email;
            
            return redirect()->route('student.register',compact('username','email'))->with('error','The pasword is not match');
        }

        Student::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        rankings::insert([
            // 'StudentID' = Auth::guard('student')->user()->id,
            'Name' => $request->name,
            'total_nilam' => 0,
        ]);
        Alert::success('Registration', 'register successfully!');

        return redirect()->route('student_login_form')->with('error','Student Account Created Successfully');
    }
}