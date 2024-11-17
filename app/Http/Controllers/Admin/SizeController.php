<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Traits\Searchable;

class SizeController extends Controller
{
    use Searchable;
    public function index(Request $request)
    {
        $query = $request->input('query'); // Lấy từ khóa tìm kiếm từ request
        $sizes = $this->search(Size::class, $query, ['name']); // Dùng trait

        return view('admin.sizes.index', compact('sizes','query'));
    }

    public function create()
    {
        return view('admin.sizes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'width' => 'required|min:1',
            'height' => 'required|min:1',
        ]);

        Size::create($request->all());

        return redirect()->route('sizes.index')
                         ->with('success', 'Size created successfully.');
    }

    public function edit(Size $size)
    {
        return view('admin.sizes.edit', compact('size'));
    }

    public function update(Request $request, Size $size)
    {
        $request->validate([
            'name' => 'required|min:2',
            'width' => 'required|min:1',
            'height' => 'required|min:1',
        ]);

        $size->update($request->all());

        return redirect()->route('sizes.index')
                         ->with('success', 'Size updated successfully.');
    }

    public function destroy(Size $size)
    {
        $size->delete();

        return redirect()->route('sizes.index')
                         ->with('success', 'Size deleted successfully.');
    }
}
