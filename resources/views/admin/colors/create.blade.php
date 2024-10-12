@extends('adminlte::page')

@section('content')
    <h1>Add Color</h1>
    <form action="{{ route('colors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Color Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="value" class="form-label">Color picker</label>
            <input type="color" class="form-control form-control-color col-1" name="value">
        </div>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
@endsection
