@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Discount</h1>

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display error message -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Table to display all discounts -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Nominal</th>
                    <th>Unit</th>
                    <th>Condition</th>
                    <th>Frequency</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($discounts as $discount)
                    <tr>
                        <td>{{ $discount->id }}</td>
                        <td>{{ $discount->name }}</td>
                        <td>{{ $discount->nominal }}</td>
                        <td>{{ $discount->unit }}</td>
                        <td>{{ $discount->condition }}</td>
                        <td>{{ $discount->frequency->name }}</td>
                        <td>
                            <a href="{{ route('discounts.edit', $discount->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('discounts.destroy', $discount->id) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Link to create new discount -->
        <a href="{{ route('discounts.create') }}" class="btn btn-primary">New Discount</a>
    </div>
@endsection
