<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::all();
        $date = Booking::select('bookingdate')->orderBy('bookingdate','ASC')->get();
        $filtered_date = array();
        foreach ($date as $dates) {
            if (!in_array($dates, $filtered_date)) {
                $filtered_date[] = $dates;
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
        return view('admin.admin_roombooking', compact('booking','date'))->with(request()->input('page'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booking = Booking::all();

        return view('admin.admin_roombooking_view',compact('booking'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('admin.admin_admin_show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('admin.admin_admin_edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {

        $booking->status = $request->input('status');
        $booking->update();
        // $student_name = $request->input('name');
        // $student_email = $request->input('email');

        // DB::update('update students set name = ?, email = ? where id = ?' ,  [$student_name, $student_email, $id]);
        return redirect()->route('booking.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.index')->with('success','The user is deleted successfully');
    }
}
