@extends('admin.layouts.base');

@section('title', 'Edit Discount');

@section('content')
    <div class="container">
        <!-- Display error message -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form to edit existing discount -->
        <form action="{{ route('discounts.update', $discount->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $discount->name) }}">
            </div>
            <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="text" name="nominal" id="nominal" class="form-control"
                    value="{{ old('nominal', $discount->nominal) }}">
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <select name="unit" id="unit" class="form-control">
                    <option value="percent" {{ old('unit', $discount->unit) == 'percent' ? 'selected' : '' }}>Percent
                    </option>
                    <option value="rupiah" {{ old('unit', $discount->unit) == 'rupiah' ? 'selected' : '' }}>Rupiah</option>
                </select>
            </div>
            <div class="form-group">
                <label for="condition">Condition</label>
                <input type="text" name="condition" id="condition" class="form-control"
                    value="{{ old('condition', $discount->condition) }}">
            </div>
            <div class="form-group">
                <label for="frequency_id">Frequency</label>
                <select name="frequency_id" id="frequency_id" class="form-control">
                    @foreach ($frequencies as $frequency)
                        <option value="{{ $frequency->id }}"
                            {{ old('frequency_id', $discount->frequency_id) == $frequency->id ? 'selected' : '' }}>
                            {{ $frequency->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
