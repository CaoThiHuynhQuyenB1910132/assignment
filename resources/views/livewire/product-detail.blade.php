<div>
    <section class="sec-product-detail bg0 p-t-105 p-b-70">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-6">
                    <div class="m-r--30 m-r-0-lg">
                        <div id="slide100-01">
                            <div class="wrap-main-pic-100 bo-all-1 bocl12 pos-relative">
                                <div class="main-frame">
                                    @foreach($product->productImages as $image)
                                        <div class="wrap-main-pic">
                                            <div class="main-pic">
                                                <div class="image-container">

                                                    <img src="{{ ('storage/' . $image->image) }}" alt="IMG-SLIDE">

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="p-l-70 p-t-35 p-l-0-lg">
                        <h4 class="js-name1 txt-l-104 cl3 p-b-16">
                            {{ $product->name }}
                        </h4>
                        <h6>
                            <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                <del>{{ CurrencyHelper::format($product->original_price) }}</del>
                            </span>
                            <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                {{ CurrencyHelper::format($product->selling_price) }}
                            </span>
                        </h6>
                        <div class="flex-w flex-m p-t-30 p-b-27">

                            <span class="fs-16 cl11 lh-15 txt-center m-r-15 p-tb-5">
                                   @php
                                       $fullStars = floor($productRating); // Số sao đầy
                                       $halfStar = $productRating - $fullStars; // Phần nửa sao
                                       $emptyStars = 5 - $fullStars - ceil($halfStar); // Số sao rỗng
                                   @endphp
                                @for ($i = 1; $i <= $fullStars; $i++)
                                    <i class="fa fa-star m-rl-1"></i>
                                @endfor

                                @if ($halfStar > 0)
                                    <i class="fa fa-star-half-o m-rl-1"></i>
                                @endif

                                @for ($i = 1; $i <= $emptyStars; $i++)
                                    <i class="fa fa-star-o m-rl-1"></i>
                                @endfor
                            </span>
                            <span class="txt-s-115 cl6 p-b-3">
                                {{$productRating}} ({{$feedbacks->count()}} customer review)
                            </span>
                        </div>
                        <p class="txt-s-101 cl6">
                            {{$product->description}}
                        </p>
                            <div class="flex-w flex-m p-t-55 p-b-30">
                                <div class="wrap-num-product flex-w flex-m bg12 p-rl-10 m-r-30 m-b-30">
                                    <div wire:click="decQuantity" class="btn-num-product-down flex-c-m fs-29"></div>
                                    <input wire:model="quantity" value="{{ $product->quantity }}" class="txt-m-102 cl6 txt-center num-product" type="text" id="quantity" name="quantity"
                                           value="1" readonly>
                                    <div wire:click="incQuantity" class="btn-num-product-up flex-c-m fs-16"></div>
                                </div>
                                <button wire:click.prevent="addToCart({{ $product->id }})" type="button" class="btn flex-c-m txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04 m-b-30">
                                    Add to cart
                                </button>
                            </div>

                        <div class="txt-s-107 p-b-6">
                            <span class="cl6">
                                Category:
                            </span>
                            <span class="cl9">
                                {{$product->category->name}}
                            </span>
                        </div>
                        <div class="txt-s-107 p-b-6">
                            <span class="cl6">
                                Tags:
                            </span>
                            <a href="#" class="txt-s-107 cl9 hov-cl10 trans-04">
                                Healthy,
                            </a>
                            <a href="#" class="txt-s-107 cl9 hov-cl10 trans-04">
                                Organic
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab02 p-t-80">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews ({{$feedbacks->count()}})</a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="p-t-30">
                            <p class="txt-s-112 cl9">
                                {{$product->description}}
                            </p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="reviews" role="tabpanel">

                        <div class="p-t-36">
                            <h5 class="txt-m-102 cl3 p-b-36">
                                {{$feedbacks->count()}} review for {{ $product->name }}
                            </h5>

                            @foreach($feedbacks as $feedback)
                                <div class="flex-w flex-sb-t bo-b-1 bocl15 p-b-37">
                                    <div class="wrap-pic-w size-w-56">
                                        <img src="{{ asset('storage/'.$feedback->user->avatar) }}" alt="AVATAR">
                                    </div>
                                    <div class="size-w-57 p-t-2">
                                        <div class="flex-w flex-sb-m p-b-8">
                                            <div class="flex-w flex-b m-r-20 p-tb-5">
                                            <span class="txt-m-103 cl6 m-r-20">
                                                {{ $feedback->user->name }}
                                            </span>
                                                <span class="txt-s-120 cl9">
                                                <small class="text-muted" id="invoice-time">
                                                {{ $feedback->created_at->format('g:i A')}}
                                            </small>
                                                {{$feedback->created_at->format('d')}} - {{$feedback->created_at->format('m')}} - {{$feedback->created_at->format('Y')}}
                                            </span>
                                            </div>
                                            <span class="fs-16 cl11 lh-15 txt-center m-r-15 p-tb-5">
                                            @for($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $feedback->rating)
                                                        <i class="fa fa-star m-rl-1"></i>
                                                    @else
                                                        <i class="fa fa-star-o m-rl-1"></i>
                                                    @endif
                                                @endfor
                                        </span>
                                        </div>
                                        <p class="txt-s-101 cl6">
                                            {{ $feedback->content }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            {{ $feedbacks->links() }}
                        </div>

                        @if (session()->has('message'))
                            <div>{{ session('message') }}</div>
                        @endif

                        @if (session()->has('comment_product_id'))
                            <form action="{{ route('product.comment', ['id' => $product->id]) }}" method="POST" class="w-full p-t-42">
                                @csrf
                                <h5 class="txt-m-102 cl3 p-b-20">
                                    Add a review
                                </h5>
                                <p class="txt-s-101 cl6 p-b-10">
                                    Your email address will not be published. Required fields are marked *
                                </p>
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
                                                <input class="dis-none" type="number" name="rating">
                                            </span>
                                    @error('rating')
                                    <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <span class="txt-s-101 cl6">
                                        Your review *
                                    </span>
                                <div class="row p-t-12">
                                    <div class="col-12 p-b-30">

                                            <textarea
                                                class="txt-s-101 cl3 plh1 size-a-26 bo-all-1 bocl11 focus1 p-rl-20 p-tb-10"
                                                name="content" placeholder="Your review *"></textarea>
                                    </div>
                                </div>
                                <div class="flex-r">
                                    @if($checkBought === true)
                                        <button class="flex-c-m txt-s-103 cl0 bg10 size-a-27 hov-btn2 trans-04">
                                            Submit
                                        </button>
                                    @endif
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
