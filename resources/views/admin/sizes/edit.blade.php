@extends('adminlte::page')

@section('content')
    <h1>SỬA KÍCH THƯỚC</h1>

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
            <label for="name">Tên kích thước</label>
            <input type="text" name="name" class="form-control" value="{{ $size->name }}" required>
        </div>
        <div class="form-group">
            <label for="name">Chiều dài</label>
            <input type="text" name="width" class="form-control" value="{{ $size->width }}" required>
        </div>
        <div class="form-group">
            <label for="name">Chiều rộng</label>
            <input type="text" name="height" class="form-control" value="{{ $size->height }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
