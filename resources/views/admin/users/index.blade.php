@extends('adminlte::page')

@section('content')
<div class="container mt-5">
    <h1>Quản lý tài khoản</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->role_id == 1) Admin
                    @elseif($user->role_id == 2) Staff
                    @else User
                    @endif
                </td>
                <td>
                    @if($user->is_locked) <span class="text-danger">Bị khóa</span>
                    @else <span class="text-success">Hoạt động</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('admin.users.lock', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">
                            @if($user->is_locked) Mở khóa @else Khóa @endif
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
