<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(): View
    {
        return view('client.order.checkout');
    }

    public function thankYou()
    {
        $message = 'Transaction success';
        $vnpSecureHash = request('vnp_SecureHash');
        $vnpHashSecret = config('services.vnPay.vnp_hash_secret');

        $inputData = array();
        foreach (request()->query() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnpHashSecret);

        if ($secureHash != $vnpSecureHash) {
            $message = 'Invalid literal character!';

            return view('client.order.thank-you', [
                'message' => $message,
            ]);
        }

        if (request('vnp_ResponseCode') != '00') {
            $message = 'Transaction failed!';

            return view('client.order.thank-you', [
                'message' => $message,
            ]);
        }

        Order::where('tracking_number', request('vnp_TxnRef'))->update([
            'payment_status' => 'success'
        ]);

        return view('client.order.thank-you', [
            'message' => $message,
        ]);

    }
}
