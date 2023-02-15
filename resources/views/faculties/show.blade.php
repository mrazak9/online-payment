@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Faculty Detail</h1>
        <table class="table table-bordered">
            <tr>
                <td>ID</td>
                <td>{{ $faculty->id }}</td>
            </tr>
            <tr>
                <td>Code</td>
                <td>{{ $faculty->code }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $faculty->name }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>{{ $faculty->status }}</td>
            </tr>
        </table>
        <a href="{{ route('faculties.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
