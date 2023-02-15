@extends('admin.layouts.base');

@section('title', 'Data Discounts');

@section('content')
    <div class="container">
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
        <table id="discount" class="table table-bordered table-hover">
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
                            <a href="{{  route('discounts.show', $discount->id) }}"
                                class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('discounts.edit', $discount->id) }}"
                                class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> </a>
                            <form action="{{ route('discounts.destroy', $discount->id)  }}" method="post"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i
                                        class="fas fa-trash"></i></button>
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

@section('js')
    <script>
        $('#discount').DataTable();
    </script>
@endsection
