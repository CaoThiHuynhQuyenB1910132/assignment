<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListShop extends Component
{
    use WithPagination;

    public mixed $searchTerm = '';

    public mixed $sortTerm = [];

    public mixed $sortBy = [];

    public function mount(): void
    {
    }

    public function updatedSearchTerm()
    {
        $this->dispatch('refresh');
    }

    public function updatedSortTerm()
    {
        $this->dispatch('refresh');
    }

    public function updatedSortBy()
    {
        $this->dispatch('refresh');
    }

    #[On('refresh')]
    public function render(): View
    {
        $topProducts = DB::table('order_products')
            ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->limit(2)
            ->get();

        $product = collect($topProducts)->pluck('product_id')->toArray();

        $bestSellers = Product::whereIn('id', $product)->get();

        return view('livewire.list-shop', [
            'products' =>  Product::where('name', 'like', '%' . $this->searchTerm . '%')
                ->where('stock', 1)
                ->when($this->sortTerm, function ($query) {
                    $query->whereIn('category_id', $this->sortTerm);
                })
                ->when($this->sortBy, function ($query) {
                    $query->when($this->sortBy == 'highToLow', function ($subQuery) {
                        $subQuery->orderBy('selling_price', 'desc');
                    })
                        ->when($this->sortBy == 'lowToHigh', function ($subQuery) {
                            $subQuery->orderBy('selling_price', 'asc');
                        });
                })
                ->paginate(6),
            'bestSellers' => $bestSellers,
        ]);
    }
}
