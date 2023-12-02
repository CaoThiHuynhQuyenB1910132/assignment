@extends('client.layouts.app')
@section('content')
    <div class="bg0 p-tb-50">
        <div class="container">
            <div class="track" style="margin-bottom: 100px">
                <?php
                $steps = [
                    'pending' => ['icon' => 'fa fa-check', 'text' => 'Pending'],
                    'accepted' => ['icon' => 'fa fa-user', 'text' => 'accepted'],
                    'in-delivery' => ['icon' => 'fa fa-truck', 'text' => 'in-delivery'],
                    'success' => ['icon' => 'fa fa-archive', 'text' => 'success'],
                    'cancel' => ['icon' => 'fa fa-times', 'text' => 'cancel'],
                    'refund' => ['icon' => 'fa fa-money', 'text' => 'refund'],
                ];
                ?>
                @foreach($steps as $step => $info)
                    @if($order->status == $step)
                        <div class="step active">
                            @else
                                <div class="step">
                                    @endif
                                    <span class="icon"><i class="{{ $info['icon'] }}"></i></span>
                                    <span class="text">{{ $info['text'] }}</span>
                                </div>
                                @endforeach
                        </div>
                <div>
                    <div class="flex-col card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 p-b-50">
                                        <div class="p-r-15 p-rl-0-lg">
                                            <h4 class="txt-m-124 cl3 p-b-28 text-center">
                                                Your Order Information
                                            </h4>
                                            <div class="how-bor3 p-rl-30 p-tb-32">
                                                <div class="p-b-24">
                                                    <div class="txt-s-101 cl6 p-b-10">
                                                        Order Tracking Number:
                                                        <span class="badge badge-success">#{{ $order->tracking_number }}</span>
                                                    </div>
                                                </div>
                                                <div class="p-b-24">
                                                    @foreach($orderProducts as $orderProduct)
                                                        <div class="flex-w flex-sb-t p-b-30">
                                                            <div class="size-w-64 wrap-pic-w">
                                                                <img src="{{ $orderProduct->product->productImages->count() ?
                                                                            asset('storage/' . $orderProduct->product->productImages[0]->image) : '' }}"
                                                                     alt="IMG" style="width: 100px">
                                                            </div>
                                                            <div class="size-w-65 flex-col-l p-t-7">
                                                                <div class="txt-m-103 cl3 hov-cl10 trans-04 p-b-3">
                                                                    {{ $orderProduct->product->name }}
                                                                </div>
                                                                <small class="text-muted">{{ $orderProduct->product->description }}</small>
                                                                <span class="txt-s-106 cl9">
                                                                    {{ $order->updated_at->format('d')}} - {{$order->updated_at->format('m')}} - {{$order->updated_at->format('Y')}}
                                                                    <small class="text-muted" id="invoice-time">
                                                                        {{ $order->updated_at->format('g:i A')}}
                                                                    </small>
                                                                </span>
                                                            </div>
                                                            <a href="{{ route('comment.product', ['id' => $orderProduct->product->id]) }}"><img src="client/new/images/icons/icon-cmt.png" style="width: 15px"></a>

                                                        </div>
                                                    @endforeach
                                                        <div class="flex-w flex-m bo-b-1 bocl15 w-full p-tb-18">
                                                    <span class="size-w-58 txt-m-109 cl3">
                                                            Total
                                                    </span>
                                                            <span class="size-w-59 txt-m-104 cl10">
                                                          {{ number_format($order->total, 0, '.','.') }} VNĐ
                                                    </span>
                                                        </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    @if($order->status === 'success')
                                        <div wire:ignore.self class="col-md-12 p-b-50">
{{--                                            <livewire:feedback-order :orderId="$order->id"  wire:key="feedbackOrder"></livewire:feedback-order>--}}
                                        </div>
                                    @endif
                                </div>
                                <div class="p-l-15 p-rl-0-lg">
                                    <h4 class="txt-m-124 cl3 p-b-28 text-center">
                                        Your Review
                                    </h4>
                                    <div class="how-bor3 p-rl-30 p-t-32 p-b-66">
                                        <div class="p-b-24">
                                            <div class="flex-w flex-m p-b-3">
                        <span class="txt-s-101 cl6 p-b-5 m-r-10">
                            Your Rating
                        </span>
                                                <span class="wrap-rating fs-16 cl11 pointer">
                            <i class="item-rating pointer fa fa-star-o m-rl-1"></i>
                            <i class="item-rating pointer fa fa-star-o m-rl-1"></i>
                            <i class="item-rating pointer fa fa-star-o m-rl-1"></i>
                            <i class="item-rating pointer fa fa-star-o m-rl-1"></i>
                            <i class="item-rating pointer fa fa-star-o m-rl-1"></i>
                            <input wire:model="rating" class="dis-none" type="number" name="rating">
                        </span>
                                                @error('rating')
                                                <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="p-b-24">
                                            <div class="p-b-24">
                                                <div class="txt-s-101 cl6 p-b-10">
                                                    Add Photo
                                                </div>
                                                <input
                                                    wire:model="image"
                                                    type="file"
                                                    class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15 focus1"
                                                    multiple
                                                    name="image">
                                            </div>
                                        </div>
                                        <div class="p-b-24">
                                    <textarea
                                        wire:model="content"
                                        class="txt-s-101 cl3 plh1 size-a-26 bo-all-1 bocl11 focus1 p-rl-20 p-tb-10"
                                        name="content" placeholder="Your review *"></textarea>
                                        </div>
                                        <div class="flex-w p-t text-center">
                                            <button class="flex-c-m txt-s-105 cl0 bg10 size-a-39 hov-btn2 trans-04 p-rl-10 m-r-18 align-items-center">
                                                Submit review
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
            body{background-color: #eeeeee;font-family: 'Open Sans',serif}.container{margin-top:50px;margin-bottom: 50px}.card{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 0.10rem}.card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}.card-header{padding: 0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}.track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px}.track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}.track .step.active:before{background: #FF5722}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #ee5435;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #ee5435;border-color: #ee5435;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #ff2b00;border-color: #ff2b00;border-radius: 1px}
        </style>
@endsection
