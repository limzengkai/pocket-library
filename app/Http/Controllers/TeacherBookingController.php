<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class TeacherBookingController extends Controller
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
        return view('admin.admin_roombooking', compact('booking','date'));
    }



    public function personal()
    {
        $date = Booking::select()
            ->where('name', Auth::guard('teacher')->user()->name)
            ->orderBy('bookingdate','ASC')->get();
            // ->paginate(5);
        // dd($date);
        // dd(Auth::guard('teacher')->user()->name);
        $filtered_date = array();
        $now = Carbon::today()->format("Y-m-d");

        foreach($date as $dates){
            if($dates->bookingdate >= $now){
                $filtered_date[] = $dates;
            }
        }
        $date = $filtered_date;

        return view('Teacher.booking', compact('date'))->with(request()->input('page'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::today()->format("Y-m-d");
        return view('Teacher.booking_submit',compact('now'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'room' => 'required|nullable|min:6',
        // ]);

        if($request->date < Carbon::now()->format("Y-m-d")){
            return redirect()->route('teacher.booking.create')->with('Failed','The date already pass. Please select correct date');
        }else if($request->start_time < "08:00" || $request->End_time > "18:00"){
            return redirect()->route('teacher.booking.create')->with('Failed','Please enter time the time in between 9:00 AM until 6:00 PM');
        }else if($request->End_time < $request->start_time){
            return redirect()->route('teacher.booking.create')->with('Failed','Please enter with Ending Time greater than Starting Time');
        }
        else if($request->room == null){
            Alert::warning('Warning!!!', 'Please fill the room type');
            return redirect()->route('teacher.booking.create');
        }
        Booking::create([
            'name' => $request->name,
            'room' => $request->room,
            'bookingdate' => $request->date,
            'TimeIn' => $request->start_time,
            'TimeOut' => $request->End_time,
            'status' => $request->status

        ]);
        Alert::success('success','Booking created successfully');

        return redirect()->route('teacher.booking');
    }

    public function show(Booking $booking)
    {
        $booking = Booking::select()
        ->where('name', Auth::guard('teacher')->user()->name)
        ->orderBy('bookingdate','ASC')->get();
        // dd($booking);

        return view('Teacher.booking_view',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $now = Carbon::today()->format("Y-m-d");

        return view('teacher.booking_edit',compact('booking','now'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->room = $request->room;
        $booking->bookingdate = $request->date;
        $booking->TimeIn = $request->start_time;
        $booking->TimeOut = $request->End_time;
        $booking->status = $request->status;

        $booking->update();
        // DB::update('update students set name = ?, email = ? where id = ?' ,  [$student_name, $student_email, $id]);
        return redirect()->route('teacher.booking')->with('success','Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->route('teacher.booking')->with('success','The booking is deleted successfully');
    }
}
