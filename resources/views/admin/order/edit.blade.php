@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="page-title-box">
            <h4 class="page-title">Order Details</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="border p-3 mt-4 mt-lg-0 rounded">
                                            <h4 class="header-title mb-3">Order Summary</h4>
                                            <h5 class="header-title" style="color: #0a58ca">Tracking Number: #{{$order->tracking_number}}</h5>
                                            <div class="table-responsive">
                                                <table class="table table-centered mb-0">
                                                    <tbody>
                                                    @foreach($orderProducts as $product)
                                                        <tr>
                                                            <td>
                                                                <img src="{{ $product->product->productImages->count() ? asset('storage/' . $product->product->productImages[0]->image) : '' }}"
                                                                     alt="contact-img" title="contact-img" class="rounded me-2" height="48">
                                                                <p class="m-0 d-inline-block align-middle">
                                                                    <a class="text-body fw-semibold">{{ $product->product->name }}</a>
                                                                    <br>
                                                                    <small>{{ $product->quantity }} x {{ CurrencyHelper::format($product->product->selling_price) }}</small>
                                                                </p>
                                                            </td>
                                                            <td class="text-end">
                                                                {{ CurrencyHelper::format($product->product->selling_price*$product->quantity) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    <tr class="text-end">
                                                        <td>
                                                            <h6 class="m-0">Shipping:</h6>
                                                        </td>
                                                        <td class="text-end">
                                                            FREE
                                                        </td>
                                                    </tr>
                                                    <tr class="text-end">
                                                        <td>
                                                            <h5 class="m-0">Total:</h5>
                                                        </td>
                                                        <td class="text-end fw-semibold">
                                                            {{ CurrencyHelper::format($order->total) }}
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-3" style="color: #cf0a28">Notes</h4>
                                    <h5>{{ $order->notes }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-3">Shipping Information</h4>

                                    <h5>{{ $order->user->name }}</h5>

                                    <address class="mb-0 font-14 address-lg">
                                        {{ $order->shipping_address }}<br>

                                        <abbr>Phone: {{$order->user->phone}}</abbr> <br>
                                    </address>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('update.order',['id' => $order->id]) }}" method="POST">
                                        @method('PUT')
                                        @csrf

                                        <div class="col-auto">
                                            <div class="d-flex align-items-center">
                                                <label for="status-select" class="me-2">Status</label>
                                                <select class="form-select" name="status">
                                                    <option selected="">Select order status</option>
                                                    @switch($status = $order->status)
                                                        @case('pending')
                                                            <option {{ $status == 'pending' ? 'selected' : '' }} value="pending" >PENDING</option>
                                                        @case('accepted')
                                                            <option {{ $status == 'accepted' ? 'selected' : '' }}  value="accepted">ACCEPTED</option>
                                                        @case('in-delivery')
                                                            <option {{ $status == 'in-delivery' ? 'selected' : '' }}  value="in-delivery">IN DELIVERY</option>
                                                        @case('success')
                                                            <option {{ $status == 'success' ? 'selected' : '' }}  value="success">SUCCESS</option>
                                                        @case('cancel')
                                                            <option {{ $status == 'cancel' ? 'selected' : '' }}  value="cancel" >CANCEL</option>
                                                        @case('refund')
                                                            <option {{ $status == 'refund' ? 'selected' : '' }}  value="refund">REFUND</option>
                                                            @break
                                                    @endswitch
                                                </select>
                                            </div>
                                        </div>
                                        @error('status')
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="d-print-none mt-4">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

