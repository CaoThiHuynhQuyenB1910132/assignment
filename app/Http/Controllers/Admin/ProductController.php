<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\ImageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class ProductController extends Controller
{
    use ImageTrait;

    public int $itemPerPage = 10;

    public function index(): View
    {
        $products = Product::query()
            ->with('productImages')
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
        $validatedData = $request->validated();

        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'featured' => $validatedData['featured'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'stock' => $validatedData['stock'],
            'category_id' => $validatedData['category_id'],
        ]);

        $filePaths = '';

        if ($request->hasFile('images')) {
            $filePaths = $this->uploadImage($request, 'images', 'images');
            foreach ($filePaths as $filePath) {
                ProductImage::create([
                    'image' => $filePath,
                    'product_id' => $product->id,
                ]);
            }
        }

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

        $filePaths = '';

        if ($request->hasFile('images')) {
            $filePaths = $this->uploadImage($request, 'images', 'images');
            foreach ($filePaths as $filePath) {
                ProductImage::create([
                    'image' => $filePath,
                    'product_id' => $product->id,
                ]);
            }
        }

        toast('Cập nhật sản phẩm thành công', 'success');

        return redirect('product');
    }

    public function delete(string $id): RedirectResponse
    {
        $product = Product::getProductById($id);

        if ($product->carts->count() > 0)
        {
            toast('Tồn tại sản phẩm trong giỏ hàng của người dùng, Bạn không thể xóa', 'warning');
            return redirect('product');
        } else {

            foreach ($product->productImages as $image) {
                $imageUrl = 'storage/' . $image->image;
                $this->deleteImage($imageUrl);
                $image->delete();
            }

            $product->delete();

            toast('Xóa sản phẩm thành công', 'success');

            return redirect('product')->with('status', 'Xóa sản phẩm thành công!');
        }
    }

    public function deleteProductImage(string|int $id): RedirectResponse
    {
        $image = ProductImage::find($id);

        if($image) {
            $imageUrl = 'storage/' . $image->image;
            $this->deleteImage($imageUrl);
            $image->delete();
            toast('Xóa ảnh sản phẩm thành công', 'success');
            return redirect()->back();
        }

        toast('Xóa ảnh sản phẩm không thành công', 'danger');
        return redirect()->back();
    }
}
