<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\ImageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    use ImageTrait;

    public function index(Request $request): View
    {
        $searchInput = $request->input('searchInput');
        $products = Product::query()
            ->with('productImages')
            ->orderByDesc('created_at')
            ->when($searchInput, function ($query) use ($searchInput) {
                return $query->where('name', 'like', '%' . $searchInput . '%');
            })
            ->paginate(10);

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

        toast('Created Product', 'success');

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

        toast('Updated Product', 'success');

        return redirect('product');
    }

    public function delete(string $id): RedirectResponse
    {
        $product = Product::getProductById($id);

        if ($product->carts || $product->orders->count() > 0) {
            toast('The product exists in the users shopping cart. You cannot delete it', 'warning');
            return redirect('product');
        } else {

            foreach ($product->productImages as $image) {
                $imageUrl = 'storage/' . $image->image;
                $this->deleteImage($imageUrl);
                $image->delete();
            }

            $product->delete();

            toast('Deleted Product', 'success');

            return redirect('product')->with('status', 'Deleted Product');
        }
    }

    public function deleteProductImage(string|int $id): RedirectResponse
    {
        $image = ProductImage::find($id);

        if($image) {
            $imageUrl = 'storage/' . $image->image;
            $this->deleteImage($imageUrl);
            $image->delete();
            toast('Deleted Image Product', 'success');
            return redirect()->back();
        }

        toast('Deleted Image Product', 'danger');
        return redirect()->back();
    }
}
