<?php

namespace App\Http\Controllers;
use App\Models\announcement;
use Illuminate\Http\Request;

class AdminAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin_announcement_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description'=>'required'
            
        ]);

        announcement::create($request->all());
        return redirect()->route('admin.dashboard')->with('success','Announcement created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(announcement $announcement)
    {
        return view('admin.admin_admin_show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(announcement $announcement)
    {
        return view('admin.admin_announcement_edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, announcement $announcement)
    {
        $request->validate([
            'title' => 'required',
            'description'=>'required'
            
        ]);        
        $announcement->title = $request->input('title');
        $announcement->description = $request->input('description');
        $announcement->update();
        return redirect()->route('admin.dashboard')->with('success','Announcement updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('admin.dashboard')->with('success','The annoucement is deleted successfully');
    }
}
