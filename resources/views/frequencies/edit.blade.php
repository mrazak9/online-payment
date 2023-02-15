@extends('admin.layouts.base');

@section('title', 'Edit Frequency');

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Frequency</div>

                    <div class="card-body">
                        <form action="{{ route('frequencies.update', $frequency) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $frequency->code) }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $frequency->name) }}">
                            </div>

                            <div class="form-group">
                                <label for="days">Days</label>
                                <input type="text" name="days" id="days" class="form-control" value="{{ old('days', $frequency->days) }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
