<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MyAccountController extends Controller
{
    public function index(): View
    {
        return view('client.account.index');
    }

    public function deleteAddress(string $id): RedirectResponse
    {
        $address= Address::getAddressById($id);

        $address->delete();

        toast('Deleted address!', 'success');

        return redirect()->back();
    }
}
