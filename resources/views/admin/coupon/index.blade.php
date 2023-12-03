@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Coupon</h4>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <livewire:coupon-modal></livewire:coupon-modal>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                        <form method="GET" action="{{ route('coupon') }}" class="col-auto">
                                            @csrf
                                            <label for="searchInput" class="visually-hidden">Search</label>
                                            <input type="text" class="form-control" name="searchInput" id="searchInput" placeholder="Search...">
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="datatable table table-stripped table table-hover table-center mb-0 mt-3">
                                            <thead class="table-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Coupon Code</th>
                                                <th>Amount</th>
                                                <th>Discount Price</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($coupons as $key => $coupon)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>
                                                        {{ $coupon->code }}
                                                    </td>

                                                    <td>
                                                        {{ $coupon->amount }}
                                                    </td>

                                                    <td>
                                                        {{ CurrencyHelper::format($coupon->discount_price) }}
                                                    </td>

                                                    <td class="table-action">
                                                        <a href="{{ route('delete.coupon', ['id' => $coupon->id]) }}" class="action-icon" onclick="return confirm('Are you sure?')"> <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            @if(! $coupons->count())
                                                <tr>
                                                    <th class="text-center" colspan="100%">No data to display</th>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>

                                        <div class="pt-3">{{ $coupons->links() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
