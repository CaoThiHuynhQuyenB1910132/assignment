<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class OrderHistoryController extends Controller
{
    public function index(): View
    {
        return view('client.account.order-history');
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

    public function commentOnProduct(string $productId): RedirectResponse
    {
        Session::put('comment_product_id', $productId);
        Session::put('feedback_id', null);

        return redirect()->route('product.detail', ['id' => $productId]);
    }

    public function cancel(string $id): RedirectResponse
    {
        $order = Order::getOrderById($id);

        if ($order->status != 'pending') {
            toast('you can not cancel!!! your order has been confirmed', 'warning');
            return redirect()->back();
        }
        $order->status = 'cancel';

        $order->save();

        toast('Canceled Order!', 'success');

        return redirect()->back();
    }
}
