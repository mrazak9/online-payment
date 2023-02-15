@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Display discount details -->
        <h2>{{ $discount->name }}</h2>
        <p>Nominal: {{ $discount->nominal }} {{ $discount->unit }}</p>
        <p>Condition: {{ $discount->condition }}</p>
        <p>Frequency: {{ $discount->frequency->name }}</p>

        <!-- Link to go back to the list of discounts -->
        <a href="{{ route('discounts.index') }}" class="btn btn-secondary">Back</a>

    </div>
@endsection
