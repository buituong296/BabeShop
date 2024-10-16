@extends('adminlte::page')

@section('content')
    <h1>DANH SÁCH KÍCH THƯỚC</h1>
    <a href="{{ route('sizes.create') }}" class="btn btn-primary">Thêm mới</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên kích thước</th>
                <th>Chiều dài</th>
                <th>Chiều rộng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sizes as $size)
                <tr>
                    <td>{{ $size->id }}</td>
                    <td>{{ $size->name }}</td>
                    <td>{{ $size->width }}</td>
                    <td>{{ $size->height }}</td>
                    <td>
                        <a href="{{ route('sizes.edit', $size->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('sizes.destroy', $size->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
