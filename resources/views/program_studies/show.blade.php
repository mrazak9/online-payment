@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Show Program Study</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 20%">Code</td>
                                    <td>{{ $programStudy->code }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Name</td>
                                    <td>{{ $programStudy->name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Faculty</td>
                                    <td>{{ $programStudy->faculty->name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Status</td>
                                    <td>{{ $programStudy->status }}</td>
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
