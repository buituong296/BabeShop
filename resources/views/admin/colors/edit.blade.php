@extends('adminlte::page')

@section('content')
    <h1>Edit Color</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('colors.update', $color->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Color Name</label>
            <input type="text" name="name" class="form-control" value="{{ $color->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Color</button>
    </form>
@endsection
