@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
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
                                    <div class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                        <form method="GET" action="{{ route('order') }}" class="col-auto">
                                            @csrf
                                            <label for="searchInput" class="visually-hidden">Search</label>
                                            <input type="search" class="form-control" name="searchInput" id="searchInput" placeholder="Search...">
                                        </form>

                                        <form method="GET" action="{{ route('order') }}" class="col-auto">
                                            @csrf
                                            <div class="col-auto">
                                                <div class="col-auto">
                                                    <div class="d-flex align-items-center">
                                                        <label for="selectedStatus" class="me-2">Status</label>
                                                        <select name="selectedStatus" class="form-select" id="selectedStatus">
                                                            <option selected="">Choose...</option>
                                                            <option value="pending">pending</option>
                                                            <option value="accepted">accepted</option>
                                                            <option value="in-delivery">in-delivery</option>
                                                            <option value="success">success</option>
                                                            <option value="cancel">cancel</option>
                                                            <option value="refund">refund</option>
                                                        </select>
                                                        <button type="submit" class="btn btn-secondary"><i class="mdi mdi-filter"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Order Tracking Number</th>
                                        <th>Date Order</th>
                                        <th>Date Update</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th style="width: 125px;">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($orders as $key => $order)
                                    <tr>
                                        <td>
                                            <a  class="badge badge-danger-lighten" href="{{ route('edit.order', ['id' => $order->id]) }}" class="text-body fw-bold">
                                                #{{ $order->tracking_number }}
                                            </a>
                                        </td>

                                        <td>{{$order->created_at->format('d')}} - {{$order->created_at->format('m')}} - {{$order->created_at->format('Y')}}
                                            <small class="text-muted" id="invoice-time">
                                                {{ $order->created_at->format('g:i A')}}
                                            </small>
                                        </td>
                                        <td>{{$order->updated_at->format('d')}} - {{$order->updated_at->format('m')}} - {{$order->updated_at->format('Y')}}
                                            <small class="text-muted" id="invoice-time">
                                                {{ $order->updated_at->format('g:i A')}}
                                            </small>
                                        </td>

                                        <td>{{$order->payment}}</td>

                                        <td>
                                            {{$order->payment_status}}
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

                                        <td class="table-action">
                                            <a href="{{ route('edit.order', ['id' => $order->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        </td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="pt-3">{{ $orders->appends(['selectedStatus' => request('selectedStatus')])->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
