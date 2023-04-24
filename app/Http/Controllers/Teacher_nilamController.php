<?php

namespace App\Http\Controllers;

use App\Models\nilam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Teacher_nilamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $nilam = DB::table('nilams')
            ->select()->get();
            // dd($nilam);
        return view('teacher.nilam', compact('nilam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('Student.nilam_submit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
    }

    /**
     * Display the specified resource.
     *
     * 
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(nilam $nilam)
    {
        // dd($nilam);
        return view('Teacher.nilam_view', compact('nilam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(nilam $nilam)
    {
        
        return view('Teacher.nilam_view',compact('nilam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nilam $nilam)
    {
        // $nilam->title = $request->input('book_title');
        // $nilam->type = $request->type;
        // $nilam->date = $request->input('date');
        // $nilam->language = $request->input('language');
        // $nilam->publisher = $request->input('Publisher');
        // $nilam->author = $request->input('Author');
        // $nilam->status = $request->input('status');
        // $nilam->yearofpublication = $request->input('YearOP');
        // $nilam->NoofPages = $request->input('NoOP');
        // $nilam->summary = $request->input('Summary');
        // $nilam->update();

        // return redirect()->route('nilam.index')->with('success','Nilam updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(nilam $nilam)
    {
        // $nilam->delete();
        // return redirect()->route('nilam.index')->with('success','The nilam is deleted successfully');
    }
}
