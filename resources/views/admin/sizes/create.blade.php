@extends('adminlte::page')

@section('content')
    <h1>THÊM KÍCH THƯỚC</h1>
    <form action="{{ route('sizes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên kích thước</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Chiều dài</label>
            <input type="text" name="width" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Chiều rộng</label>
            <input type="text" name="height" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
    </form>
@endsection
