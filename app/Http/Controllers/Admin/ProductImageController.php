<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Traits\ImageTrait;

class ProductImageController extends Controller
{
    use ImageTrait;

    public int $itemPerPage = 10;

    public function index(): View
    {
        $product_images = ProductImage::query()
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);

        return view('admin.product-image.index', compact('product_images'));
    }

    public function create(): View
    {
        $products = Product::all();

        return view('admin.product-image.create', compact('products'));
    }

    public function store(ProductImageRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request, 'image', 'images');
        }

        ProductImage::create([
            'image' => $data['image'],
            'product_id' =>$data['product_id'],
        ]);

        toast('Create new image success', 'success');

        return redirect('product-image');
    }

    public function edit(string $id): View
    {
        $products = Product::all();

        $product_image = ProductImage::getProductImageById($id);

        return view('admin.product-image.edit', compact('product_image', 'products'));
    }

    public function update(ProductImageRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();

        $product_image = ProductImage::getProductImageById($id);

        if ($request->hasFile('image')) {
            $image = 'storage/' . $product_image->image;

            $this->deleteImage($image);

            $data['image'] = $this->uploadImage($request, 'image', 'images');
        } else {
            $data['image'] = $product_image->image;
        }

        $product_image->update([
            'image' => $data['image'],
            'product_id' => $data['product_id'],
        ]);

        toast('Update new image success', 'success');

        return redirect('product-image');
    }

    public function delete(string $id): RedirectResponse
    {
        $product_image = ProductImage::getProductImageById($id);

        $image = 'storage/' . $product_image->image;

        $this->deleteImage($image);

        $product_image->delete();

        toast('Delete banner success', 'success');

        return redirect('product-image');
    }
}
