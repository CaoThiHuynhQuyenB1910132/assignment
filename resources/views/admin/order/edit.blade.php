@extends('admin.layouts.app')

@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Order Details</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Order Details</h4>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 col-sm-11">

                    <div class="horizontal-steps mt-4 mb-4 pb-5" id="tooltip-container">
                        <div class="horizontal-steps-content">
                            <div class="step-item">
                                <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="20/08/2018 07:24 PM">Order Placed</span>
                            </div>
                            <div class="step-item current">
                                <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="21/08/2018 11:32 AM">Packed</span>
                            </div>
                            <div class="step-item">
                                <span>Shipped</span>
                            </div>
                            <div class="step-item">
                                <span>Delivered</span>
                            </div>
                        </div>

                        <div class="process-line" style="width: 33%;"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Items from Order #{{$order->tracking_number}}</h4>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <tr>

                                        @foreach($orderProducts as $product)
                                            <td>{{ $product->product->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->purchase_price }}</td>
                                        @endforeach
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
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
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Notes</h4>
                            <h5>{{ $order->notes }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('update.order',['id' => $order->id]) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div>
                                    <select class="form-control " name="status" style="border: none">
                                        <option>Select order status</option>
                                        @switch($order->status)
                                            @case('pending')
                                                <option value="pending" >PENDING</option>
                                            @case('accepted')
                                                <option value="accepted">ACCEPTED</option>
                                            @case('in_delivery')
                                                <option value="in_delivery">IN DELIVERY</option>
                                            @case('success')
                                                <option value="success">SUCCESS</option>
                                            @case('cancel')
                                                <option value="cancel" >CANCEL</option>
                                            @case('refund')
                                                <option value="refund">REFUND</option>
                                                @break
                                        @endswitch
                                    </select>

                                    @error('status')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="d-print-none mt-4">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>

@endsection

