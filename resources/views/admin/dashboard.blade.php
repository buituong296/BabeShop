@extends('adminlte::page')

@section('title', 'BabelShop')

@section('content_header')
    <h1>Bảng điều khiển</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>Danh mục</p>
                </div>
                <div class="icon">
                    <i class="fas fa-list"></i>
                </div>
                <a href="{{ route('categories.index') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53</h3>
                    <p>Màu sắc</p>
                </div>
                <div class="icon">
                    <i class="fas fa-paint-brush"></i>
                </div>
                <a href="{{ route('colors.index') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>Kích thước</p>
                </div>
                <div class="icon">
                    <i class="fas fa-ruler"></i>
                </div>
                <a href="{{ route('sizes.index') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>Đơn hàng</p>
                </div>
                <div class="icon">
                    <i class="fas fa-ruler"></i>
                </div>
                <a href="{{ route('bills.index') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop
