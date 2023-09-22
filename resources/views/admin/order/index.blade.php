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
                                <li class="breadcrumb-item active">Orders</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Orders</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-xl-8">
                                    <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                        <div class="col-auto">
                                            <label for="inputPassword2" class="visually-hidden">Search</label>
                                            <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-flex align-items-center">
                                                <label for="status-select" class="me-2">Status</label>
                                                <select class="form-select" id="status-select">
                                                    <option selected="">Choose...</option>
                                                    <option value="1">Paid</option>
                                                    <option value="2">Awaiting Authorization</option>
                                                    <option value="3">Payment failed</option>
                                                    <option value="4">Cash On Delivery</option>
                                                    <option value="5">Fulfilled</option>
                                                    <option value="6">Unfulfilled</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xl-4">
                                    <div class="text-xl-end mt-xl-0 mt-2">
                                        <button type="button" class="btn btn-danger mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add New Order</button>
                                        <button type="button" class="btn btn-light mb-2">Export</button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0">
                                    <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tracking Number</th>
                                        <th>Status</th>
                                        <th>Date Order</th>
                                        <th>Checker</th>
                                        <th style="width: 125px;">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($orders as $order)
                                    <tr>

                                        <td>{{ $order->id }}</td>

                                        <td>
                                            <a href="{{ route('edit.order', ['id' => $order->id]) }}" class="text-body fw-bold">
                                                #{{ $order->tracking_number }}
                                            </a>
                                        </td>

                                        @if( $order->status === 'pending')
                                            <td><span class="badge badge-success-lighten">pending</span></td>
                                        @elseif($order->status === 'accepted')
                                            <td><span class="badge badge-info-lighten">accepted</span></td>
                                        @elseif($order->status === 'in-delivery')
                                            <td><span class="badge badge-success-lighten">in delivery</span></td>
                                        @elseif($order->status === 'success')
                                            <td><span class="badge badge-info-lighten">success</span></td>
                                        @elseif($order->status === 'cancel')
                                            <td><span class="badge badge-danger-lighten">cancel</span></td>
                                        @elseif($order->status === 'refund')
                                            <td><span class="badge badge-warning-lighten">refund</span></td>
                                        @endif

                                        <td>{{$order->created_at->format('d')}} - {{$order->created_at->format('m')}} - {{$order->created_at->format('Y')}}
                                            <small class="text-muted" id="invoice-time">
                                                {{ $order->created_at->format('g:i A')}}
                                            </small>
                                        </td>

                                        <td>{{$order->staff}}</td>

                                        <td class="table-action">
{{--                                            <a href="{{ route('detail.order', ['id' => $order->id]) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>--}}
                                            <a href="{{ route('edit.order', ['id' => $order->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="{{ route('delete.order', ['id' => $order->id]) }}" class="action-icon" onclick="return confirm('Are you sure?')"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
