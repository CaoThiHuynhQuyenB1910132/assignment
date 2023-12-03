<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CouponController extends Controller
{
    public function index(): View
    {
        $searchTerm = request()->query('searchInput');

        $coupons = Coupon::orderByDesc('created_at')
            ->where('code', 'like', '%' . $searchTerm . '%')
            ->paginate(20);

        return view('admin.coupon.index', [
            'coupons' => $coupons,
        ]);
    }

    public function delete(string|int $id): RedirectResponse
    {
        $coupon = Coupon::findOrFail($id);

        if (! $coupon->orders->count()) {
            $coupon->delete();
            toast('Delete '. $coupon->code .' Success', 'success');
            return redirect()->back();
        }

        toast('Can not delete '. $coupon->code, 'warning');
        return redirect()->back();
    }
}
