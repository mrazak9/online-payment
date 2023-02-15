@extends('admin.layouts.base');

@section('title', 'Create Faculty');

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
    <form action="{{ route('faculties.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" name="code" class="form-control" placeholder="Enter code">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
