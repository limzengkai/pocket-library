<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\rankings;
use App\Models\Teacher;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileController extends Controller
{
    public function StudentIndex()
    {
        $data = Student::all()
            ->where('id', Auth::guard('student')->user()->id)->first();
        
        return view('Student.profile',compact('data'));
    }
    
    /**
     * Display the user's profile form.
     */
    public function StudentEdit(Request $request)
    {
        $student = Student::find(Auth::guard('student')->user()->id);
        $student->name = $request->input('username');
        $student->FirstName = $request->input('first_name');
        $student->LastName = $request->input('last_name');
        $student->Phone_number = $request->input('phone_number');
        $student->Year = $request->input('year');
        $student->Address = $request->input('Address');
        $student->update();
        $ranking = rankings::find(Auth::guard('student')->user()->id);
        $ranking->Name = $request->input('username');
        $ranking->update();
        Alert::success('Success', 'The user profile updated successfully!');

        return redirect()->route('student.profile');
    }

    public function TeacherIndex()
    {
        $data = Teacher::all()->where('id', Auth::guard('teacher')->user()->id)->first();
        
        return view('Teacher.profile',compact('data'));
    }

    public function TeacherEdit(Request $request)
    {

        $teacher = Teacher::find(Auth::guard('teacher')->user()->id);
        $teacher->name = $request->input('username');
        $teacher->FirstName = $request->input('first_name');
        $teacher->LastName = $request->input('last_name');
        $teacher->Phonenumber = $request->input('phone_number');
        $teacher->Age = $request->input('age');
        $teacher->Address = $request->input('Address');
        $teacher->update();
        
        Alert::success('Success', 'The user profile updated successfully!');

        return redirect()->route('teacher.profile');
    }

    // /**

    public function store(Request $request)
    {
        if($request->hasFile('image')){
            
            $destination_path = 'public/images/students';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);
            // dd($request);
            $input['image'] = $image_name;

            $student = Student::find(Auth::guard('student')->user()->id);
            $student->image = $image_name;
            $student->update();
        }
        Alert::success('Success', 'Profile picture update successfully!');

        return Redirect::route('student.profile');
    }

    public function teacherstore(Request $request)
    {
        if($request->hasFile('image')){
            
            $destination_path = 'public/images/teachers';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);
            // dd($request);
            $input['image'] = $image_name;

            $teacher = Teacher::find(Auth::guard('teacher')->user()->id);
            $teacher->image = $image_name;
            $teacher->update();
        }
        Alert::success('Success', 'Profile picture update successfully!');

        return Redirect::route('teacher.profile');
    }

    public function show()
    {
        $data = Student::all()->where('id', Auth::guard('student')->user()->id)->first();

        return view('layouts.layout',compact('data'));
    }

    public function tshow()
    {
        $tdata = Teacher::all()->where('id', Auth::guard('student')->user()->id)->first();

        return view('layouts.tlayout',compact('tdata'));
    }
}
