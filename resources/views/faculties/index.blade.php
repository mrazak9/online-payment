@extends('admin.layouts.base');

@section('title', 'Faculties');

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Faculties</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('faculties.create') }}" class="btn btn-success">Create Faculty</a>
                        </div>
                    </div>
                    <br>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <table id="faculty" class="table table-bordered table-hover">
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
                                    @foreach ($faculties as $faculty)
                                        <tr>
                                            <td>{{ $faculty->id }}</td>
                                            <td>{{ $faculty->code }}</td>
                                            <td>{{ $faculty->name }}</td>
                                            <td>{{ $faculty->status }}</td>
                                            <td>
                                                <a href="{{ route('faculties.show', $faculty->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('faculties.edit', $faculty->id) }}"
                                                    class="btn btn-warning"> <i class="fas fa-edit"></i> </a>
                                                <form action="{{ route('faculties.destroy', $faculty->id) }}" method="post"
                                                    style="display:inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i></button>
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
    </div>
@endsection

@section('js')
    <script>
        $('#faculty').DataTable();
    </script>
@endsection
