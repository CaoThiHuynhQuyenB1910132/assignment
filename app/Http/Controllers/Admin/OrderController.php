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
    public int $itemPerPage = 10;

    public function index(): View
    {
        $orders = Order::query()
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);

        return view('admin.order.index', compact('orders'));
    }

    public function edit(string $id): View
    {
        $order = Order::getOrderById($id);

        $orderProducts = OrderProduct::where('order_id', $order->id)->with('product')->get();

        return view('admin.order.edit', compact('order','orderProducts'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->validate([
            'status' => 'in:pending,accepted,in_delivery,success,cancel,refund',
        ]);

        $order = Order::getOrderById($id);

        $order->update([
            'status' => $data['status'],
            'staff' => Auth::user()->id,
        ]);

        toast('Cập nhật sản phẩm thành công', 'success');

        return redirect('order');
    }

}
