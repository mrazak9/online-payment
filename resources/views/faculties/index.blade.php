@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Faculties</h1>
    @if(count($faculties) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faculties as $faculty)
                <tr>
                    <td>{{ $faculty->id }}</td>
                    <td>{{ $faculty->code }}</td>
                    <td>{{ $faculty->name }}</td>
                    <td>{{ $faculty->status }}</td>
                    <td>
                        <a href="{{ route('faculties.show', $faculty->id) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('faculties.edit', $faculty->id) }}" class="btn btn-warning"> Edit</a>
                        <form action="{{ route('faculties.destroy', $faculty->id) }}" method="post" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No faculties found</p>
    @endif
    <a href="{{ route('faculties.create') }}" class="btn btn-primary">Add Faculty</a>
</div>
@endsection
