<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // đơn hàng mới 'pending'
        $newOrders = Order::where('status', 'pending')->count();

        $allOrders = Order::all()->count();
        $successOrders = Order::where('status', 'success')->count();

        //tỉ lệ giao hàng thành công
        $bounceRate = round(($successOrders / $allOrders), 2) * 100;

        $users = User::all()->count();

        // doanh thu tháng
        $monthlyRevenue = Order::getMonthlyRevenue();

        $date = Carbon::now();
        $month = $date->month;

        return view('admin.dashboard.index', compact('newOrders', 'bounceRate', 'users', 'monthlyRevenue', 'month'));
    }

    public function revenue(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'nullable|date_format:Y',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'validation fails',
            ]);
        }

        $validatedData = $validator->validated();
        $year = $validatedData['year'];

        $query = Order::select(DB::raw('SUM(total) as total_sum, MONTH(updated_at) as month'))
            ->where('status', 'success');

        if ($year) {
            $query->whereYear('updated_at', $year);
        }

        $results = $query->groupBy(DB::raw('MONTH(updated_at)'))
            ->orderBy(DB::raw('MONTH(updated_at)'))
            ->get();

        $labels = [];
        $data = [];

        foreach ($results as $result) {
            $monthLabel = date('F', mktime(0, 0, 0, $result->month, 1));
            $labels[] = $monthLabel;
            $data[] = $result->total_sum;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
