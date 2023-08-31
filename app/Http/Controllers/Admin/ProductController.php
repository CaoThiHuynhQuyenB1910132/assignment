<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public int $itemPerPage = 10;

    public function index(): View
    {
        $products = Product::query()
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);

        return view('admin.product.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $product = $request->validated();

        Product::create([
            'name' => $product['name'],
            'description' => $product['description'],
            'status' => $product['status'],
            'featured' => $product['featured'],
            'original_price' => $product['original_price'],
            'selling_price' => $product['selling_price'],
            'stock' => $product['stock'],
            'category_id' => $product['category_id'],
        ]);

        toast('Tạo Sản Phẩm Thành Công', 'success');

        return redirect('product');
    }

    public function edit(string $id): View
    {
        $product = Product::getProductById($id);

        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();

        $product = Product::getProductById($id);

        $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => $data['status'],
            'featured' => $data['featured'],
            'original_price' => $data['original_price'],
            'selling_price' => $data['selling_price'],
            'stock' => $data['stock'],
            'category_id' => $data['category_id'],
        ]);

        toast('Cập nhật sản phẩm thành công', 'success');

        return redirect('product');
    }

    public function delete(string $id): RedirectResponse
    {
        $product = Product::getProductById($id);

        $product->delete();

        toast('Xóa sản phẩm thành công', 'success');

        return redirect('product')->with('status', 'Xóa sản phẩm thành công!');
    }
}
