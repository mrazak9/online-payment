@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Concentrations</div>

                <div class="card-body">
                    <a href="{{ route('concentrations.create') }}" class="btn btn-primary mb-3">Create Concentration</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Program Study</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($concentrations as $concentration)
                                <tr>
                                    <td>{{ $concentration->id }}</td>
                                    <td>{{ $concentration->code }}</td>
                                    <td>{{ $concentration->name }}</td>
                                    <td>{{ $concentration->status }}</td>
                                    <td>{{ $concentration->program_study->name }}</td>
                                    <td>
                                        <a href="{{ route('concentrations.show', $concentration->id) }}" class="btn btn-primary">Show</a>
                                        <a href="{{ route('concentrations.edit', $concentration->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('concentrations.destroy', $concentration->id) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
