<?php

namespace App\Http\Controllers;

use App\Models\Concentration;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConcentrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concentrations = Concentration::paginate(10);
        return view('concentrations.index', compact('concentrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program_studies = ProgramStudy::all();
        return view('concentrations.create', compact('program_studies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'program_study_id' => 'required|exists:program_studies,id',
        ]);

        if ($validator->fails()) {
            return request();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $concentration = Concentration::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'program_study_id' => $request->input('program_study_id'),
        ]);

        return redirect()->route('concentrations.index')->with('success', 'Concentration created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $concentration = Concentration::findOrFail($id);
        return view('concentrations.show', compact('concentration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Concentration $concentration)
    {
        $program_studies = ProgramStudy::all();
        return view('concentrations.edit', compact('concentration', 'program_studies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concentration $concentration)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'program_study_id' => 'required|exists:program_studies,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $concentration->update([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'program_study_id' => $request->input('program_study_id'),
        ]);

        return redirect()->route('concentrations.index')->with('success', 'Concentration updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concentration $concentration)
    {
        $concentration->delete();
        return redirect()->route('concentrations.index')->with('success', 'Concentration deleted successfully');
    }
}
