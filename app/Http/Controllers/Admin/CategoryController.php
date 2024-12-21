<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\Searchable;

class CategoryController extends Controller
{
    use Searchable;
    public function index(Request $request)
    {
        $query = $request->input('query'); // Lấy từ khóa tìm kiếm từ request
        $categories = $this->search(Category::class, $query, ['name']); // Dùng trait
        return view('admin.categories.index', compact('categories', "query"));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|min:2|max:255',
        ]);

        // Lấy bản ghi cần xóa
        $category = Category::findOrFail($id);

        // Xóa bản ghi cũ
        $category->delete();

        // Thêm bản ghi mới với dữ liệu đã cập nhật
        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
