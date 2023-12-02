<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\ImageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use ImageTrait;


    public function index(Request $request): View
    {
        $searchInput = $request->input('searchInput');
        $categories = Category::query()
            ->orderByDesc('created_at')
            ->when($searchInput, function ($query) use ($searchInput) {
                return $query->where('name', 'like', '%' . $searchInput . '%');
            })
            ->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->image($request, 'image', 'images');
        }
        Category::create([
            'name' => $validatedData['name'],
            'image' => $validatedData['image'],
            'featured' => $validatedData['featured'],
        ]);

        toast('Create New Category Success', 'success');

        return redirect('category');
    }

    public function edit(string $id): View
    {
        $category = Category::getCategoryById($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();

        $category = Category::getCategoryById($id);

        if ($request->hasFile('image')) {
            $image = 'storage/' . $category->image;

            $this->deleteImage($image);

            $data['image'] = $this->image($request, 'image', 'images');
        } else {
            $data['image'] = $category->image;
        }

        $category->update([
            'name' => $data['name'],
            'image' => $data['image'],
            'featured' => $data['featured'],
        ]);

        toast('Updated Category', 'success');

        return redirect('category');
    }

    public function delete(string $id): RedirectResponse
    {
        $category = Category::getCategoryById($id);

        if($category->products->count() > 0) {
            toast('You can not delete category !!! Check product', 'warning');
            return redirect('category');
        } else {
            $image = 'storage/' . $category->image;

            $this->deleteImage($image);

            $category->delete();

            toast('Deleted Category', 'success');

            return redirect('category');
        }
    }
}
