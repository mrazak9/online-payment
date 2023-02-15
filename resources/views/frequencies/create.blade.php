@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Frequency</div>

                    <div class="card-body">
                        <form action="{{ route('frequencies.store') }}" method="post">

                            @csrf

                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" name="code" id="code" class="form-control"
                                    value="{{ old('code') }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="days">Days</label>
                                <input type="text" name="days" id="days" class="form-control"
                                    value="{{ old('days') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
