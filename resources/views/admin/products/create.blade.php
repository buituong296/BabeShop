@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Tạo Sản Phẩm Mới</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên Sản Phẩm</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" name="price" class="form-control" id="price" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh</label>
            <input type="file" name="image" class="form-control" id="image" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea name="description" class="form-control" id="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Danh Mục</label>
            <select name="category_id" class="form-control" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Số Lượng</label>
            <input type="number" name="quantity" class="form-control" id="quantity" required>
        </div>

        <h3>Biến Thể Sản Phẩm</h3>
        <div id="variant-container">
            <div class="variant-row mb-3">
                <div class="row">
                    <div class="col">
                        <label for="color_id" class="form-label">Màu Sắc</label>
                        <select name="variants[0][color_id]" class="form-control" required>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="size_id" class="form-label">Kích Thước</label>
                        <select name="variants[0][size_id]" class="form-control" required>
                            @foreach($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="stock" class="form-label">Tồn Kho</label>
                        <input type="number" name="variants[0][stock]" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="list_price" class="form-label">Giá Niêm Yết</label>
                        <input type="number" name="variants[0][list_price]" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="sale_price" class="form-label">Giá Bán</label>
                        <input type="number" name="variants[0][sale_price]" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="import_price" class="form-label">Giá Nhập</label>
                        <input type="number" name="variants[0][import_price]" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" id="add-variant" class="btn btn-primary">Thêm Biến Thể</button>
        <button type="submit" class="btn btn-success">Tạo Sản Phẩm</button>
    </form>
</div>

<script>
    let variantIndex = 1; // Đếm số lượng biến thể
    document.getElementById('add-variant').addEventListener('click', function() {
        const container = document.getElementById('variant-container');
        const newVariant = `
            <div class="variant-row mb-3">
                <div class="row">
                    <div class="col">
                        <label for="color_id" class="form-label">Màu Sắc</label>
                        <select name="variants[${variantIndex}][color_id]" class="form-control" required>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="size_id" class="form-label">Kích Thước</label>
                        <select name="variants[${variantIndex}][size_id]" class="form-control" required>
                            @foreach($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="stock" class="form-label">Tồn Kho</label>
                        <input type="number" name="variants[${variantIndex}][stock]" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="list_price" class="form-label">Giá Niêm Yết</label>
                        <input type="number" name="variants[${variantIndex}][list_price]" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="sale_price" class="form-label">Giá Bán</label>
                        <input type="number" name="variants[${variantIndex}][sale_price]" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="import_price" class="form-label">Giá Nhập</label>
                        <input type="number" name="variants[${variantIndex}][import_price]" class="form-control" required>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-danger remove-variant" style="margin-top: 32px;">Xóa</button>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newVariant);
        variantIndex++;
    });

    // Xóa biến thể
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-variant')) {
            // Chỉ cho phép xóa nếu không phải biến thể đầu tiên
            const variantRows = document.querySelectorAll('.variant-row');
            if (variantRows.length > 1) {
                event.target.closest('.variant-row').remove();
            }
        }
    });
</script>
@endsection
