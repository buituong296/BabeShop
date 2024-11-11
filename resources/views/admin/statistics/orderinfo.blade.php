@extends('adminlte::page')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Khách hàng</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->created_at->format('d-m-Y') }}</td>
                <td>{{ number_format($order->total, 0, ',', '.') }} VND</td>
                <td>{{ $order->billStatus->name}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
