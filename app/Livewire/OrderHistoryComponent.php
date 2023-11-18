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
    public function getOrdersByStatus(string $status)
    {
        if ($status === 'all') {
            return Order::all()->where('user_id', Auth::id());
        }
        return Order::where('user_id', Auth::id())->where('status', $status)->orderByDesc('created_at')->get();
    }

    #[On('refreshSearch')]

    public function render(): View
    {
        $orders = Order::where('tracking_number', 'like', '%' . $this->searchTrackingNumber . '%')->orderByDesc('created_at')->paginate(10);
        return view('livewire.order-history-component', [
            'orders' => $orders
        ]);
    }
}
