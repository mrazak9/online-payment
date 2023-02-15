@extends('admin.layouts.base');

@section('title', 'Detail Frequency : '.$frequency->id);

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $frequency->code }}</div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Code</th>
                                    <td>{{ $frequency->code }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $frequency->name }}</td>
                                </tr>
                                <tr>
                                    <th>Days</th>
                                    <td>{{ $frequency->days }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('frequencies.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection