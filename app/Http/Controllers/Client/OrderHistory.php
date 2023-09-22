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

    public function cancle(string $id): RedirectResponse
    {
        $order = Order::getOrderById($id);

        $order->delete();

        toast('Cancled Order!', 'success');

        return redirect()->back();
    }
}
