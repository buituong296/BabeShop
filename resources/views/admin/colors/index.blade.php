@extends('adminlte::page')

@section('content')
    <h1>Colors</h1>
    <a href="{{ route('colors.create') }}" class="btn btn-primary">Add Color</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Value</th>
                <th>Color</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($colors as $color)
                <tr>
                    <td>{{ $color->id }}</td>
                    <td>{{ $color->name }}</td>
                    <td>{{ $color->value }}</td>
                    <td><input type="color" class="row-3" value="{{ $color->value }}" disabled></td>
                    <td>
                        <a href="{{ route('colors.edit', $color->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('colors.destroy', $color->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
