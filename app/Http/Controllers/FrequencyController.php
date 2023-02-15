<?php

namespace App\Http\Controllers;

use App\Models\Frequency;
use Illuminate\Http\Request;

class FrequencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frequencies = Frequency::all();

        return view('frequencies.index', compact('frequencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frequencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $frequency = Frequency::create($request->all());

        return redirect()->route('frequencies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Frequency  $frequency
     * @return \Illuminate\Http\Response
     */
    public function show(Frequency $frequency)
    {
        return view('frequencies.show', compact('frequency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Frequency  $frequency
     * @return \Illuminate\Http\Response
     */
    public function edit(Frequency $frequency)
    {
        return view('frequencies.edit', compact('frequency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Frequency  $frequency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frequency $frequency)
    {
        $frequency->update($request->all());

        return redirect()->route('frequencies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Frequency  $frequency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frequency $frequency)
    {
        $frequency->delete();

        return redirect()->route('frequencies.index');
    }
}
