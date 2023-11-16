<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $selectedStatus = $request->input('selectedStatus');
        $searchInput = $request->input('searchInput');

        $orders = Order::query()
            ->when($selectedStatus, function ($query) use ($selectedStatus) {
                return $query->where('status', $selectedStatus);
            })
            ->when($searchInput, function ($query) use ($searchInput) {
                return $query->where('tracking_number', 'like', '%' . $searchInput . '%');
            })
            ->paginate(10);

        return view('admin.order.index', compact('orders'));
    }

    public function edit(string $id): View
    {
        $order = Order::getOrderById($id);

        $orderProducts = OrderProduct::where('order_id', $order->id)->with('product')->get();

        return view('admin.order.edit', compact('order', 'orderProducts'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->validate([
            'status' => 'in:pending,accepted,in-delivery,success,cancel,refund',
        ]);

        $order = Order::getOrderById($id);

        $order->update([
            'status' => $data['status'],
            'staff' => Auth::user()->id,
        ]);

        toast('Updated Order', 'success');

        return redirect('order');
    }
}
