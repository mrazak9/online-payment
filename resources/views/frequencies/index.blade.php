@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Frequencies <a href="{{ route('frequencies.create') }}" class="btn btn-primary float-right">Create New</a></div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Days</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($frequencies as $frequency)
                                    <tr>
                                        <td>{{ $frequency->code }}</td>
                                        <td>{{ $frequency->name }}</td>
                                        <td>{{ $frequency->days }}</td>
                                        <td>
                                            <a href="{{ route('frequencies.show', $frequency) }}" class="btn btn-primary">Show</a>
                                            <a href="{{ route('frequencies.edit', $frequency) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('frequencies.destroy', $frequency) }}" method="post" style="display:inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Delete</button>
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
