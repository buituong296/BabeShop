@extends('adminlte::page')

@section('content')
    <h1>Edit Size</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sizes.update', $size->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Size Name</label>
            <input type="text" name="name" class="form-control" value="{{ $size->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Size</button>
    </form>
@endsection
