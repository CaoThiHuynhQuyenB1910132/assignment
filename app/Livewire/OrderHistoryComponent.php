<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class OrderHistoryComponent extends Component
{
    public string $filterBy = 'all';

    public mixed $orders;

    public $orderId;
    public function mount(): void
    {
        $this->orders = $this->getOrdersByStatus($this->filterBy);
    }

    public function changeType(string $type): void
    {
        $this->filterBy = $type;
        $this->orders = $this->getOrdersByStatus($type);
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
        $orders = Order::orderByDesc('created_at')->paginate(10);
        //        $orderProducts = OrderProduct::where('order_id', $this->orderId)->get();
        return view('livewire.order-history-component', [
            'orders' => $orders,
//            'orderProducts' => $orderProducts
        ]);
    }
}
