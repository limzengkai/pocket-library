<?php

namespace App\Http\Controllers;

use App\Models\nilam;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Teacher_nilam_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryOrder = "CASE WHEN status = 'Pending' THEN 1 ";
        $queryOrder .= "WHEN status = 'Approved' THEN 2 ";
        $queryOrder .= "ELSE 3 END";
        $nilam = DB::table('nilams')
            ->select()->orderByRaw($queryOrder)->orderBy('created_at', 'DESC')->get();
            // dd($nilam);

        $names = array();
        $name = Student::all();
        foreach($name as $sname){
            $names[$sname->id] = $sname->name;        
        }
        return view('teacher.nilam', compact('nilam','names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(nilam $nilam, $id)
    {
        $nilam =  DB::table('nilams')
                ->select()->where('id', $id)->first();
        // dd($nilam);
        return view('Teacher.nilam_view', compact('nilam'));
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $nilam = nilam::where('title', 'LIKE' , '%'.$search_text.'%')->get();

        return view('Teacher.nilam_search', compact('nilam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $nilam =nilam::find($id);

        // dd($nilam->status);
        $nilam->status = $request->status;

        $nilam->update();

        return redirect()->route('tnilam.show', $id);
    }
}
