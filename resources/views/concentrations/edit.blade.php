@extends('admin.layouts.base');

@section('title', 'Edit Concentration');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Concentration</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('concentrations.update', $concentration->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                    id="code" name="code" value="{{ old('code', $concentration->code) }}">
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $concentration->name) }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="program_study_id">Program Study</label>
                                <select class="form-control @error('program_study_id') is-invalid @enderror" id="program_study_id"
                                    name="program_study_id">
                                    <option value="">-- Choose Program Study --</option>
                                    @foreach ($program_studies as $programStudy)
                                        <option value="{{ $programStudy->id }}"
                                            {{ old('program_study_id', $concentration->program_study_id) == $programStudy->id ? 'selected' : '' }}>
                                            {{ $programStudy->name }}</option>
                                    @endforeach
                                </select>
                                @error('program_study_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status">
                                    <option value="">-- Choose Status --</option>
                                    <option value="active"
                                        {{ old('status', $concentration->status) == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option
                                        value="inactive"{{ old('status', $concentration->status) == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('concentrations.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
@endsection
