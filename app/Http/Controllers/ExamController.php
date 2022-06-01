<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Lecturer;
use Carbon\CarbonPeriod;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::orderBy('startDate','asc')->get();
        return view('exam.index')->with('exams',$exams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exam.addExam');
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
            'ename' => 'required',
            'semester' => 'required',
            'sdate' => 'required',
            'edate' => 'required',
            'sessionNo' => 'required'
        ]);

        $exam = Exam::create([
            'examName' => $request->ename,
            'semester' => $request->semester,
            'startDate' => $request->sdate,
            'endDate' => $request->edate,
            'sessionNo' => $request->sessionNo,
        ]);

        return redirect('/exam-detail/{id}');
    }

    public function detail($id)
    {
        $lecturers = Lecturer::orderBy('joined_on','asc')->get();

        $startDate = Exam::where('id', $id)->value('startDate');
        $endDate = Exam::where('id', $id)->value('endDate');
        $dates = CarbonPeriod::create($startDate, $endDate);
        // $dates = $period->toArray();
        $datesWithoutSundays = collect($dates)->filter(function ($date) {
            return !$date->isSunday();
        });

        $exam = Exam::find($id);

        $classRooms = ClassRoom::all();

        //dd($datesWithoutSundays);
        return view('exam.examDetails')->with(['lecturers'=>$lecturers,'datesWithoutSundays'=>$datesWithoutSundays,'exam'=>$exam,'classRooms'=>$classRooms]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::find($id);
        return view('exam.viewExam')->with('exam',$exam);
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
    public function destroy($id)
    {
        //
    }
}
