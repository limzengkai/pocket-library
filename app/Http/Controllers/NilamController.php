<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\nilam;
use App\Models\rankings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class NilamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($nilam);
        $queryOrder = "CASE WHEN status = 'Pending' THEN 1 ";
        $queryOrder .= "WHEN status = 'Approved' THEN 2 ";
        $queryOrder .= "ELSE 3 END";
        $nilam = DB::table('nilams')
            ->select()->where('StudentID', Auth::guard('student')->user()->id)->orderByRaw($queryOrder)->orderBy('created_at','DESC')->get();

        return view('Student.nilam', compact('nilam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::now();
        return view('Student.nilam_submit',compact('now'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        nilam::create([
            'title' => $request->book_title,
            'StudentID' => Auth::guard('student')->user()->id,
            'type' => $request->type,
            'date' => $request->date,
            'language' => $request->language,
            'publisher' => $request->Publisher,
            'author' => $request->Author,
            'status' => $request->status,
            'yearofpublication' => $request->YearOP,
            'NoofPages' => $request->NoOP,
            'summary' => $request->Summary,
        ]);

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
        Alert::success('Success', 'New nilam added successfully!');

        return redirect()->route('nilam.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(nilam $nilam)
    {
        return view('Student.nilam_view', compact('nilam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(nilam $nilam)
    {
        return view('Student.nilam_edit',compact('nilam'));
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
        $nilam->title = $request->input('book_title');
        $nilam->type = $request->type;
        $nilam->date = $request->input('date');
        $nilam->language = $request->input('language');
        $nilam->publisher = $request->input('Publisher');
        $nilam->author = $request->input('Author');
        $nilam->status = $request->input('status');
        $nilam->yearofpublication = $request->input('YearOP');
        $nilam->NoofPages = $request->input('NoOP');
        $nilam->summary = $request->input('Summary');
        $nilam->update();
        Alert::success('Sucess', 'The nilam updated successfully!');

        return redirect()->route('nilam.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(nilam $nilam)
    {
        $nilam->delete();
        return redirect()->route('nilam.index')->with('success','The nilam is deleted successfully');
    }
}
