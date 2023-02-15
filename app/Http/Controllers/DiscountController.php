<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Frequency;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('discounts.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $frequencies = Frequency::all();
        return view('discounts.create', compact('frequencies'));
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
            'name' => 'required',
            'nominal' => 'required|numeric',
            'unit' => 'required|in:percent,rupiah',
            'condition' => 'required',
            'frequency_id' => 'required|exists:frequencies,id'
        ]);
        Discount::create($validatedData);
        return redirect()->route('discounts.index')->with('success', 'Discount created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        return view('discounts.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        $frequencies = Frequency::all();
        return view('discounts.edit', compact('discount','frequencies' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'name' => 'required',
            'nominal' => 'required|numeric',
            'unit' => 'required|in:percent,rupiah',
            'condition' => 'required',
            'frequency_id' => 'required|exists:frequencies,id'
        ]);

        $discount->update($request->only([
            'name', 'nominal', 'unit', 'condition', 'frequency_id'
        ]));

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully.');
    }
}
