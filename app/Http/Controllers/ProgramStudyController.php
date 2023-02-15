<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudy;
use App\Models\Faculty;
use Illuminate\Http\Request;

class ProgramStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program_studies = ProgramStudy::with('faculty')->get();
        return view('program_studies.index', compact('program_studies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('program_studies.create', compact('faculties'));
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
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'faculty_id' => 'required|exists:faculties,id'
        ]);

        ProgramStudy::create($validatedData);
        return redirect()->route('program_studies.index')->with('success', 'Program Study created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $programStudy = ProgramStudy::findOrFail($id);
        return view('program_studies.show', compact('programStudy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramStudy $programStudy)
    {
        $faculties = Faculty::all();
        return view('program_studies.edit', compact('programStudy', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramStudy $programStudy)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'faculty_id' => 'required|exists:faculties,id'
        ]);

        $programStudy->update($validatedData);
        return redirect()->route('program_studies.index')->with('success', 'Program Study updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramStudy $programStudy)
    {
        $programStudy->delete();
        return redirect()->route('program_studies.index')->with('success', 'Program Study deleted successfully');
    }
}
