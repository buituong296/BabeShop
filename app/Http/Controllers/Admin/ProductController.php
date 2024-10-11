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

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('variants')->get();
        return view('admin.products.index', compact('products'));
    }

    public function show($id)
{
    $product = Product::with(['category', 'variants.color', 'variants.size'])->findOrFail($id);
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

    $imagePath = $request->file('image')->store('products', 'public');

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

    return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công!');
}


public function edit($id)
{
    $product = Product::with('variants')->findOrFail($id);
    $categories = Category::all();
    $colors = Color::all();
    $sizes = Size::all();

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

    $product->save();

    // Cập nhật các biến thể
    $product->variants()->delete(); // Xóa tất cả các biến thể hiện có

    foreach ($request->variants as $variantData) {
        $product->variants()->create($variantData);
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

}
