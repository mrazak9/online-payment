@extends('admin.layouts.base');

@section('title', 'Data Program Study');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Program Studies</h3>
                    <div class="card-tools">
                        <a href="{{ route('program_studies.create') }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table id="prodi" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Faculty</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($program_studies as $program_study)
                            <tr>
                                <td>{{ $program_study->id }}</td>
                                <td>{{ $program_study->code }}</td>
                                <td>{{ $program_study->name }}</td>
                                <td>{{ $program_study->faculty->name }}</td>
                                <td>{{ $program_study->status }}</td>
                                <td>
                                    <a href="{{ route('program_studies.show', $program_study->id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('program_studies.edit', $program_study->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('program_studies.destroy', $program_study->id) }}" method="post" class="d-inline">
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
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#prodi').DataTable();
    </script>
@endsection