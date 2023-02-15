@extends('admin.layouts.base');

@section('title', 'Detail Concentration : '.$concentration->id);

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Show Concentration</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 20%">Code</td>
                                    <td>{{ $concentration->code }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Name</td>
                                    <td>{{ $concentration->name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Program Study</td>
                                    <td>{{ $concentration->program_study->name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Status</td>
                                    <td>{{ $concentration->status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('program_studies.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
