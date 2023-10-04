<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderHistory extends Controller
{
    public function index(): View
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('client.account.history', compact('orders'));
    }

    public function detail(string $id): View
    {
        $order = Order::getOrderById($id);

        if (Auth::id() != $order->user_id) {
            abort(403);
        }

        $orderProducts = OrderProduct::where('order_id', $order->id)->get();

        return view('client.account.order-detail-history', compact('order', 'orderProducts'));
    }


    public function cancel(string $id): RedirectResponse
    {
        $order = Order::getOrderById($id);

        if ($order->status != 'pending'){
            toast('you can not cancel!!! your order has been confirmed', 'warning');
            return redirect()->back();
        }
        $order->status = 'cancel';

        $order->save();

        toast('Canceled Order!', 'success');

        return redirect()->back();
    }
}
