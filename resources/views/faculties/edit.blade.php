@extends('admin.layouts.base');

@section('title', 'Edit Faculty');

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('faculties.update', $faculty->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" name="code" class="form-control" value="{{ $faculty->code }}">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $faculty->name }}">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control">
                    <option value="active" {{ $faculty->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $faculty->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection
