<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class OrderHistoryComponent extends Component
{
    use WithPagination;

    protected $perPage = 10;
    public string $filterBy = 'all';

    public mixed $searchTrackingNumber = '';

    public mixed $orders;

    public function mount(): void
    {
        $this->orders = $this->getOrdersByStatus($this->filterBy);
    }

    public function changeType(string $type): void
    {
        $this->filterBy = $type;
        $this->orders = $this->getOrdersByStatus($type);
    }

    public function updatedsearchTrackingNumber()
    {
        $this->dispatch('refreshSearch');
    }
    private function getOrdersByStatus(string $status)
    {
        if ($status === 'all') {
            return Order::all()->where('user_id', Auth::id());
        }
        return Order::where('user_id', Auth::id())->where('status', $status)->get();
    }

    #[On('refreshSearch')]
    public function render(): View
    {
        return view('livewire.order-history-component', [
            'orders' => Order::where('tracking_number', 'like', '%' . $this->searchTrackingNumber . '%')
                    ->orderBy('created_at', 'desc')
                    ->paginate($this->perPage)
        ]);
    }
}
