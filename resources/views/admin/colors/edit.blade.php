@extends('adminlte::page')

@section('content')
    <h1>SỬA MÀU SẮC</h1>

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
            <label for="name"></label>
            <input type="text" name="name" class="form-control" value="{{ $color->name }}" required>
        </div>
        <div class="form-group">
            <label for="value" class="form-label">Chọn màu sắc</label>
            <input type="color" class="form-control form-control-color col-1" name="value" value="{{ $color->value }}">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
