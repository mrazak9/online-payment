<?php

namespace App\Http\Controllers;

use App\Models\AcademicPeriod;
use Illuminate\Http\Request;

class AcademicPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academic_periods = AcademicPeriod::all();
        return view('academic_periods.index', compact('academic_periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academic_periods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'year' => 'required|max:255',
            'semester' => 'required|max:255',
            'start_date_study' => 'required|date',
            'end_date_study' => 'required|date',
            'start_date_uts' => 'required|date',
            'end_date_uts' => 'required|date',
            'start_date_uas' => 'required|date',
            'end_date_uas' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        AcademicPeriod::create($validatedData);
        return redirect()->route('academic_periods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicPeriod  $academicPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicPeriod $academicPeriod)
    {
        return view('academic_periods.show', ['academic_period' => $academicPeriod]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicPeriod  $academicPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicPeriod $academicPeriod)
    {
        return view('academic_periods.edit', compact('academic_period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicPeriod  $academicPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicPeriod $academicPeriod)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'year' => 'required|max:255',
            'semester' => 'required|max:255',
            'start_date_study' => 'required|date',
            'end_date_study' => 'required|date',
            'start_date_uts' => 'required|date',
            'end_date_uts' => 'required|date',
            'start_date_uas' => 'required|date',
            'end_date_uas' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        $academicPeriod->update($validatedData);
        return redirect()->route('academic_periods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicPeriod  $academicPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicPeriod $academicPeriod)
    {
        $academicPeriod->delete();
        return redirect()->route('academic_periods.index');
    }
}
