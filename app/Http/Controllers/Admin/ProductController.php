<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Color;
use App\Models\Size;
use App\Models\Category;
use App\Traits\Searchable;

class ProductController extends Controller
{
    use Searchable;
    public function index(Request $request)
    {
        $query = $request->input('query'); // Lấy từ khóa tìm kiếm từ request
        $products = $this->search(Product::class, $query, ['name']); // Dùng trait
        // Lấy tất cả danh mục
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'query','categories'));
    }

    public function show($id)
{
    // Lấy sản phẩm bao gồm cả soft delete
    $product = Product::withTrashed()
        ->with(['category', 'variants.color', 'variants.size'])
        ->findOrFail($id);

    return view('admin.products.show', compact('product'));
}



    public function create()
    {
        // Lấy danh sách màu sắc và kích thước
        $colors = Color::all();
        $sizes = Size::all();
        $categories = Category::all();

        return view('admin.products.create', compact('colors', 'sizes', 'categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable',
        'category_id' => 'required',
        'quantity' => 'required|integer',
        'variants' => 'required|array',
        'variants.*.color_id' => 'required|exists:colors,id',
        'variants.*.size_id' => 'required|exists:sizes,id',
        'variants.*.stock' => 'required|integer',
        'variants.*.list_price' => 'required|numeric',
        'variants.*.sale_price' => 'required|numeric',
        'variants.*.import_price' => 'required|numeric',
    ]);
    // Tính tổng số lượng các biến thể
    $totalVariantStock = collect($request['variants'])->sum('stock');
    $productQuantity = $request->input('quantity'); // Số lượng sản phẩm gửi lên


    // Validate: Tổng số lượng biến thể không vượt quá số lượng sản phẩm
    if ($totalVariantStock > $request['quantity']) {
        return redirect()->back()
            ->withInput()
            ->withErrors(['variants' => 'Tổng số lượng của các biến thể không được vượt quá số lượng sản phẩm.']);
    }
    // Kiểm tra số lượng sản phẩm không được vượt quá tổng biến thể
    if ($productQuantity > $totalVariantStock) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Số lượng sản phẩm không được lớn hơn tổng số lượng của các biến thể.');
    }

    $imagePath = $request->file('image')->store('products', 'public');
    // Kiểm tra xem biến thể có bị trùng không
    $variants = $request->input('variants');
    $uniqueVariants = collect($variants)->unique(function ($item) {
        return $item['color_id'] . '-' . $item['size_id'];
    });

    if (count($variants) != $uniqueVariants->count()) {
        return back()->withErrors(['variants' => 'Có biến thể trùng nhau (cùng màu và kích thước).'])->withInput();
    }

    $product = Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'image' => $imagePath,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'quantity' => $request->quantity,
        'is_leftover' => $request->is_leftover ? 1 : 0,
    ]);

    // Tạo các biến thể
    foreach ($request->variants as $variantData) {
        $product->variants()->create($variantData);
    }
    if ($request->hasFile('album')) {
        foreach ($request->file('album') as $albumImage) {
            $albumPath = $albumImage->store('public/albums');
            $product->album()->create(['image' => basename($albumPath)]);
        }
    }

    return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công!');
}


public function edit($id)
{
    $product = Product::with('variants')->findOrFail($id);
    $categories = Category::all();
    $colors = Color::all();
    $sizes = Size::all();
    $product = Product::with('album')->findOrFail($id);

    return view('admin.products.edit', compact('product', 'categories', 'colors', 'sizes'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        'description' => 'nullable',
        'category_id' => 'required',
        'quantity' => 'required|integer',
        'variants' => 'required|array',
        'variants.*.color_id' => 'required|exists:colors,id',
        'variants.*.size_id' => 'required|exists:sizes,id',
        'variants.*.stock' => 'required|integer',
        'variants.*.list_price' => 'required|numeric',
        'variants.*.sale_price' => 'required|numeric',
        'variants.*.import_price' => 'required|numeric',
    ]);

    // Tính tổng số lượng biến thể
    $totalVariantStock = collect($request['variants'])->sum('stock');
    $productQuantity = $request->input('quantity'); // Số lượng sản phẩm gửi lên


    // Validate: Tổng số lượng biến thể không được vượt quá số lượng sản phẩm
    if ($totalVariantStock > $request['quantity']) {
        return redirect()->back()
            ->withInput()
            ->withErrors(['variants' => 'Tổng số lượng của các biến thể không được vượt quá số lượng sản phẩm.']);
    }
    // Kiểm tra số lượng sản phẩm không được vượt quá tổng biến thể
    if ($productQuantity > $totalVariantStock) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Số lượng sản phẩm không được lớn hơn tổng số lượng của các biến thể.');
    }

    $product = Product::findOrFail($id);

    // Cập nhật thông tin sản phẩm gốc
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->category_id = $request->category_id;
    $product->quantity = $request->quantity;
    $product->is_leftover = $request->is_leftover ? 1 : 0;

    // Cập nhật hình ảnh nếu có
    if ($request->hasFile('image')) {
        // Xóa ảnh cũ nếu cần
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->image = $request->file('image')->store('products', 'public');
    }
    // Kiểm tra xem biến thể có bị trùng không
    $variants = $request->input('variants');
    $uniqueVariants = collect($variants)->unique(function ($item) {
        return $item['color_id'] . '-' . $item['size_id'];
    });

    if (count($variants) != $uniqueVariants->count()) {
        return back()->withErrors(['variants' => 'Có biến thể trùng nhau (cùng màu và kích thước).'])->withInput();
    }


    $product->save();

    // Cập nhật các biến thể
    $product->variants()->delete(); // Xóa tất cả các biến thể hiện có

    foreach ($request->variants as $variantData) {
        $product->variants()->create($variantData);
    }
    // Xử lý album ảnh mới
    if ($request->hasFile('album')) {
        foreach ($request->file('album') as $albumImage) {
            $albumPath = $albumImage->store('public/albums');
            $product->album()->create(['image' => basename($albumPath)]);
        }
    }

    return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công!');
}


    public function destroy(Product $product)
    {
        // Xóa hình ảnh nếu có
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
    public function filterProducts(Request $request)
{
    // Khởi tạo query để lọc sản phẩm
    $query = Product::query();

    // Lọc theo giá
    if ($request->filled('price_from') && $request->filled('price_to')) {
        $query->whereBetween('price', [$request->input('price_from'), $request->input('price_to')]);
    }

    // Lọc theo danh mục
    if ($request->filled('category_id') && $request->input('category_id') != '') {
        $query->where('category_id', $request->input('category_id'));
    }

    // Lấy danh sách sản phẩm đã lọc
    $products = $query->get();
    $categories = Category::all();


    // Truyền cả sản phẩm và danh mục vào view
    return view('admin.products.index', compact('products', 'categories'));
}

}
