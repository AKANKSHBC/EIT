<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::orderBy('joined_on','asc')->get();
        return view('lecturer.index')->with(['lecturers'=>$lecturers]);
    }
    public function gradeA()
    {
        $lecturers = Lecturer::where('grade','Grade A')->orderBy('joined_on','asc')->get();
        return view('lecturer.index')->with(['lecturers'=>$lecturers]);
    }
    public function gradeB()
    {
        $lecturers = Lecturer::where('grade','Grade B')->orderBy('joined_on','asc')->get();
        return view('lecturer.index')->with(['lecturers'=>$lecturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturer.addLecturer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'lname' => 'required',
            'grade' => 'required',
            'joiningDate' => 'required'
        ]);

        $lecturer = Lecturer::create([
            'name' => $request->lname,
            'grade' => $request->grade,
            'joined_on' => $request->joiningDate,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this -> validate($request, [
            'dname' => 'required',
        ]);
        
        $nam = $request->dname;
        $deleteLect = DB::table('lecturers')->where('name', $nam)->value('id');
        $fd = Lecturer::find($deleteLect);
        $fd -> delete();

        return redirect('/');
    }
}
