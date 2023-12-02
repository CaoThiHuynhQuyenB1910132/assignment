@extends('client.layouts.app')
@section('content')
    <div class="bg0 p-t-95 p-b-70">
        <div class="container">
            <div class="tab03">
                <div class="row">
                    <div class="col-md-3 col-lg-2 p-b-30">
                        <ul class="nav nav-tabs" role="tablist">
                            <li wire:ignore class="nav-item p-b-16">
                                <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
                            </li>
                            <li wire:ignore class="nav-item p-b-16">
                                <a class="nav-link" data-toggle="tab" href="#order" role="tab">Edit Profile</a>
                            </li>
                            <li wire:ignore class="nav-item p-b-16">
                                <a class="nav-link" data-toggle="tab" href="#addresses" role="tab">Addresses</a>
                            </li>
                            <li wire:ignore class="nav-item p-b-16">
                                <a class="nav-link" data-toggle="tab" href="#comment" role="tab">Reviewed</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-9 col-lg-10 p-b-30">
                        <div class="tab-content p-l-70 p-l-0-lg">
                            <div wire:ignore.self class="tab-pane fade show active" id="profile" role="tabpanel">
                                <div class="bo-all-1 bocl15 flex-w flex-sb-m p-rl-30 p-tb-10 p-rl-15-ssm">
                                    <div class="row">
                                        <div class="wrap-pic-w bg-img3 w-full-ssm col-4">
                                            <img src="{{ $user->avatar != '' ? asset('storage/' . $user->avatar) : asset('images/avatar-1.jpg') }}"
                                                 class="m-t-6 m-r-10" alt="profile-image">
                                        </div>
                                        <div class="size-w flex-col-m p-all-30 w-full-ssm col-8">
                                            <p class="text-muted mb-2 font-13"> <strong>Full Name :</strong> <span class="ms-2">{{ $user->name }}</span></p>
                                            <p class="text-muted mb-2 font-13"> <strong>Gender :</strong> <span class="ms-2">{{ $user->gender == 1 ? 'Woman' : 'Man' }}</span></p>
                                            <p class="text-muted mb-2 font-13"> <strong>Phone :</strong> <span class="ms-2">{{ $user->phone }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div wire:ignore.self class="tab-pane fade" id="addresses" role="tabpanel">
                                <livewire:location wire:key="location"></livewire:location>
                            </div>

                            <div class="tab-pane fade" id="order" role="tabpanel">
                                <div class="flex-w flex-sb">
                                    <div class="size-w-63 flex-t w-full-sm p-b-35">
                                        <form class="size-w-53 p-r-30" action="{{ route('update.account',['id' => $user->id] )}}" method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <h5 class="txt-m-109 cl3 p-b-7">
                                                Update Profile
                                            </h5>
                                            <div class="row p-b-50">
                                                <div class="col-sm-6 p-b-23">
                                                    <div>
                                                        <div class="txt-s-101 cl6 p-b-10">
                                                            Full Name
                                                        </div>
                                                        <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                               type="text" name="name" value="{{ $user->name }}">
                                                        @error('name')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 p-b-23">
                                                    <div>
                                                        <div class="txt-s-101 cl6 p-b-10">
                                                            Gender
                                                        </div>
                                                        <select class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1 @error('gender') is-invalid @enderror" name="gender">
                                                            <option value="">Choose a status</option>
                                                            <option value="1" {{ $user->gender == '1' ? 'selected' : '' }}>Woman</option>
                                                            <option value="0" {{ $user->gender == '0' ? 'selected' : '' }}>Man</option>
                                                        </select>
                                                        @error('gender')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 p-b-23">
                                                    <div>
                                                        <div class="txt-s-101 cl6 p-b-10">
                                                            Phone
                                                        </div>
                                                        <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1 @error('phone') is-invalid @enderror" type="number" name="phone" value="{{ $user->phone }}">

                                                        @error('phone')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 p-b-23">
                                                    <div>
                                                        <div class="txt-s-101 cl6 p-b-10">
                                                            Avatar
                                                        </div>
                                                        <input
                                                            type="file"
                                                            class="form-control"
                                                            multiple
                                                            name="avatar">

                                                        @error('avatar.*')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="flex-w p-rl-15 p-t-17">
                                                    <button type="submit"
                                                            class="flex-c-m txt-s-105 cl0 bg10 size-a-43 hov-btn2 trans-04 p-rl-10">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="size-w-63 flex-t w-full-sm p-b-35">
                                        <form action="{{ route('change.password',['id' => $user->id] )}}" method="POST" class="size-w-53 p-r-30">
                                            @method('PUT')
                                            @csrf
                                            <h5 class="txt-m-109 cl3 p-b-7">
                                                Change Password
                                            </h5>
                                            <div class="col-12 p-b-23">
                                                <div>
                                                    <div class="txt-s-101 cl6 p-b-10">
                                                        Current password
                                                    </div>
                                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                           type="password" name="password_old" id="password_old">
                                                    @error('password_old')
                                                    <span class="text-danger" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 p-b-23">
                                                <div>
                                                    <div class="txt-s-101 cl6 p-b-10">
                                                        New password
                                                    </div>
                                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                           type="password" name="password" id="password">
                                                    @error('password_old')
                                                    <span class="text-danger" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 p-b-23">
                                                <div>
                                                    <div class="txt-s-101 cl6 p-b-10">
                                                        Confirm new password
                                                    </div>
                                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                           type="password" name="new_password_confirmation" id="password">
                                                    @error('new_password_confirmation')
                                                    <span class="text-danger" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="flex-w p-rl-15 p-t-17 text-center">
                                                <button
                                                    class="flex-c-m txt-s-105 cl0 bg10 size-a-43 hov-btn2 trans-04 p-rl-10 ">
                                                    Save address
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div wire:ignore.self class="tab-pane fade" id="comment" role="tabpanel">
                                <h5 class="txt-m-109 cl3 p-b-7">
                                    Reviewed
                                </h5>
                                <div class="wrap-cmt">
                                    @foreach($comments as $comment)
                                        <div class="how-bor2 p-b-40 p-t-35">
                                            <div class="main-cmt flex-w flex-sb-t">
                                                <div class="wrap-pic-w size-w-71 p-t-5">
                                                    <img src="{{ asset('storage/'.$comment->user->avatar) }}" alt="AVATAR">
                                                </div>
                                                <div class="size-w-72 flex-col-l respon17">
                                                    <div class="flex-w p-b-13">
                                                    <span class="txt-s-121 cl3 m-r-20">
                                                        {{ $comment->user->name }}
                                                    </span>
                                                        <span class="txt-s-120 cl9">
                                                        <small class="text-muted" id="invoice-time">
                                                            {{ $comment->created_at->format('g:i A')}}
                                                        </small>
                                                        {{ $comment->created_at->format('d')}} - {{ $comment->created_at->format('m')}} - {{$comment->created_at->format('Y')}}
                                                    </span>
                                                    </div>

                                                    <span class="fs-16 cl11 lh-15 txt-center m-r-15 p-tb-5">
                                                    @for($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $comment->rating)
                                                                <i class="fa fa-star m-rl-1"></i>
                                                            @else
                                                                <i class="fa fa-star-o m-rl-1"></i>
                                                            @endif
                                                        @endfor
                                                    </span>
                                                    <p class="txt-s-101 cl6">
                                                        {{ $comment->content }}
                                                    </p>
                                                    <a href="#"
                                                       class="dis-block txt-s-103 cl3 bo-b-1 bocl3 hov13 trans-04 p-t-18 js-show-reply-cmt">
                                                        Detail
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="js-reply-cmt dis-none">
                                                <div class="flex-w p-t-45">
                                                    <span class="txt-m-114 cl3 m-r-19 p-b-13">
                                                        Order detail:
                                                    </span>
                                                    <span class="txt-s-121 cl6 pointer hov-cl10 trans-04 js-hide-reply-cmt p-b-13">
                                                        <img src="{{ asset('client/new/images/icons/icon-close.png') }}">
                                                    </span>
                                                </div>
                                                <div>
                                                    <li class="flex-w flex-sb-t p-b-30">
                                                        <a href="{{ route('product.detail', ['id' => $comment->product->id]) }}" class="size-w-64 wrap-pic-w hov4">
                                                            <img src="{{ $comment->product->productImages->count() ? asset('storage/' . $comment->product->productImages[0]->image) : '' }}">
                                                        </a>

                                                        <div class="size-w-65 flex-col-l p-t-7">
                                                            <a href="{{ route('product.detail', ['id' => $comment->product->id]) }}" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-3">
                                                                {{ $comment->product->name }}
                                                            </a>

                                                            <span class="txt-s-106 cl9">
                                                                {{ $comment->product->description }}
                                                            </span>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                        @if(! $comments->count())
                                            <div class="flex-t p-tb-8 m-r-30">
                                                <img class="m-t-6 m-r-10" src="{{ asset('client/new/images/icons/icon-list.png')  }}" alt="IMG">
                                                <span class="size-w-53 txt-s-101 cl6">
                                                    No review has been made yet.
                                                </span>
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
