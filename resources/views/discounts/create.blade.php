@extends('admin.layouts.base');

@section('title', 'Create Discount');

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

        <!-- Form to create new discount -->
        <form action="{{ route('discounts.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="text" name="nominal" id="nominal" class="form-control" value="{{ old('nominal') }}">
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <select name="unit" id="unit" class="form-control">
                    <option value="percent" {{ old('unit') == 'percent' ? 'selected' : '' }}>Percent</option>
                    <option value="rupiah" {{ old('unit') == 'rupiah' ? 'selected' : '' }}>Rupiah</option>
                </select>
            </div>
            <div class="form-group">
                <label for="condition">Condition</label>
                <input type="text" name="condition" id="condition" class="form-control" value="{{ old('condition') }}">
            </div>
            <div class="form-group">
                <label for="frequency_id">Frequency</label>
                <select name="frequency_id" id="frequency_id" class="form-control">
                    @foreach ($frequencies as $frequency)
                        <option value="{{ $frequency->id }}" {{ old('frequency_id') == $frequency->id ? 'selected' : '' }}>
                            {{ $frequency->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
