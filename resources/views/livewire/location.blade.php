<div>
    <section class="how-overlay2 bg-img1" style="background-image: url(client/new/images/bg-07.jpg);">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    My Account
                </h2>
                <span class="txt-m-201 cl0 flex-c-m flex-w">
                    <a href="index.html" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
                        Home
                    </a>
                    <span>
                        / My Account
                    </span>
                </span>
            </div>
        </div>
    </section>

    <div class="bg0 p-t-95 p-b-70">
        <div class="container">

            <div class="tab03">
                <div class="row">
                    <div class="col-md-3 col-lg-2 p-b-30">

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item p-b-16">
                                <a class="nav-link active" data-toggle="tab" href="#dashboard" role="tab">Dashboard</a>
                            </li>
                            <li class="nav-item p-b-16">
                                <a class="nav-link" data-toggle="tab" href="#orders" role="tab">Orders</a>
                            </li>
                            <li class="nav-item p-b-16">
                                <a class="nav-link" data-toggle="tab" href="#downloads" role="tab">Downloads</a>
                            </li>
                            <li class="nav-item p-b-16">
                                <a class="nav-link" data-toggle="tab" href="#addresses" role="tab">Addresses</a>
                            </li>
                            <li class="nav-item p-b-16">
                                <a class="nav-link" data-toggle="tab" href="#account-details" role="tab">Account
                                    details</a>
                            </li>
                            <li class="nav-item p-b-16">
                                <a class="nav-link" href="#">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9 col-lg-10 p-b-30">

                        <div class="tab-content p-l-70 p-l-0-lg">

                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                                <p class="txt-s-101 cl6 p-b-18">
                                    Hello <span class="txt-s-108">hienhtt3302</span> (not <span
                                        class="txt-s-108">hienhtt3302</span>? <a href="#"
                                                                                 class="txt-s-101 cl6 hov-cl10">Sign out</a>)
                                </p>
                                <p>
                                    From your account dashboard you can view your recent orders, manage your shipping
                                    and billing addresses and edit your password and account details.
                                </p>
                            </div>

                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="bo-all-1 bocl15 flex-w flex-sb-m p-rl-30 p-tb-10 p-rl-15-ssm">
                                    <div class="flex-t p-tb-8 m-r-30">
                                        <img class="m-t-6 m-r-10" src="images/icons/icon-list.png" alt="IMG">
                                        <span class="size-w-53 txt-s-101 cl6">
                                            No order has been made yet.
                                        </span>
                                    </div>
                                    <a href="shop-sidebar-grid.html"
                                       class="flex-c-m txt-s-105 cl0 bg10 size-a-42 hov-btn2 trans-04 p-rl-10 m-tb-8">
                                        go shop
                                    </a>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="downloads" role="tabpanel">
                                <div class="bo-all-1 bocl15 flex-w flex-sb-m p-rl-30 p-tb-10 p-rl-15-ssm">
                                    <div class="flex-t p-tb-8 m-r-30">
                                        <img class="m-t-6 m-r-10" src="images/icons/icon-list2.png" alt="IMG">
                                        <span class="size-w-53 txt-s-101 cl6">
                                            No downloads available yet.
                                        </span>
                                    </div>
                                    <a href="shop-sidebar-grid.html"
                                       class="flex-c-m txt-s-105 cl0 bg10 size-a-42 hov-btn2 trans-04 p-rl-10 m-tb-8">
                                        go shop
                                    </a>
                                </div>
                            </div>

                            <div wire:ignore.self class="tab-pane fade" id="addresses" role="tabpanel">
                                <form wire:submit.prevent="newAddress">
                                    <div class="row">
                                        <div class="col-md-7 col-lg-8 p-b-50">
                                            <div>
                                                <div class="row p-b-50">
                                                    <div class="col-sm-6 p-b-23">
                                                        <div>
                                                            <div class="txt-s-101 cl6 p-b-10">
                                                                Full Name <span class="cl12">*</span>
                                                            </div>
                                                            <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text"
                                                                   wire:model="name" name="name">
                                                            @error('name')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 p-b-23">
                                                        <div>
                                                            <div class="txt-s-101 cl6 p-b-10">
                                                                Phone <span class="cl12">*</span>
                                                            </div>
                                                            <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text"
                                                                   wire:model="phone" name="phone">
                                                            @error('phone')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 p-b-23">
                                                        <div>
                                                            <div class="txt-s-101 cl6 p-b-10">
                                                                Email <span class="cl12">*</span>
                                                            </div>
                                                            <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text"
                                                                   wire:model="email" name="email">
                                                            @error('email')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 p-b-23">
                                                        <div>
                                                            <div class="txt-s-101 cl6 p-b-10">
                                                                House Number <span class="cl12">*</span>
                                                            </div>
                                                            <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text"
                                                                   wire:model="houseNumber" name="houseNumber">
                                                            @error('houseNumber')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 p-b-23">
                                                        <div>
                                                            <label class="txt-s-101 cl6 p-b-10">
                                                                Province <span class="cl12">*</span>
                                                            </label>
                                                            <select wire:model.live="provinceId" class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text"
                                                                    name="provinceId">
                                                                <option value=""></option>
                                                                @foreach($provinces as $province)
                                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('provinceId')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 p-b-23">
                                                        <div>
                                                            <label class="txt-s-101 cl6 p-b-10">
                                                                District <span class="cl12">*</span>
                                                            </label>
                                                            <select wire:model.live="districtId" class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text"
                                                                    name="districtId">
                                                                <option value=""></option>
                                                                @foreach($districts as $district)
                                                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                                @endforeach

                                                                @error('districtId')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                                @enderror
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 p-b-23">
                                                        <div>
                                                            <label class="txt-s-101 cl6 p-b-10">
                                                                Ward <span class="cl12">*</span>
                                                            </label>
                                                            <select wire:model.live="wardId" class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text"
                                                                    name="wardId">
                                                                <option value=""></option>
                                                                @foreach($wards as $ward)
                                                                    <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('wardId')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <button class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 w-25 trans-04 p-rl-10">
                                                        Save
                                                    </button>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-7 col-lg-8 p-b-50">
                                            <div class="flex-w flex-sb p-t-37">

                                                <div class="size-w-63 flex-t w-full-sm p-b-35">
                                                    <div class="size-w-53 p-r-30">

                                                        <h5 class="txt-m-109 cl3 p-b-7">
                                                            Shipping address
                                                        </h5>
                                                        <ul>
                                                        @foreach($addresses as $address)

                                                                <li>
                                                                    <span>
                                                                        {{ $address->name }}, {{ $address->house_number }}, {{ $address->ward->name }},
                                                                        {{ $address->district->name}}, {{ $address->province->name }}
                                                                    </span>
                                                                </li>
                                                        @endforeach
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="account-details" role="tabpanel">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6 p-b-23">
                                            <div>
                                                <div class="txt-s-101 cl6 p-b-10">
                                                    First Name <span class="cl12">*</span>
                                                </div>
                                                <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                       type="text" name="first-name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 p-b-23">
                                            <div>
                                                <div class="txt-s-101 cl6 p-b-10">
                                                    Last Name <span class="cl12">*</span>
                                                </div>
                                                <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                       type="text" name="last-name">
                                            </div>
                                        </div>
                                        <div class="col-12 p-b-23">
                                            <div>
                                                <div class="txt-s-101 cl6 p-b-10">
                                                    Email address <span class="cl12">*</span>
                                                </div>
                                                <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                       type="text" name="email" placeholder="example@abc.xyz">
                                            </div>
                                        </div>
                                        <h5 class="txt-m-109 cl3 p-rl-15 p-t-10 p-b-17">
                                            Password change
                                        </h5>
                                        <div class="col-12 p-b-23">
                                            <div>
                                                <div class="txt-s-101 cl6 p-b-10">
                                                    Current password (leave blank to leave unchanged)
                                                </div>
                                                <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                       type="text" name="current-pw">
                                            </div>
                                        </div>
                                        <div class="col-12 p-b-23">
                                            <div>
                                                <div class="txt-s-101 cl6 p-b-10">
                                                    New password (leave blank to leave unchanged)
                                                </div>
                                                <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                       type="text" name="new-pw">
                                            </div>
                                        </div>
                                        <div class="col-12 p-b-23">
                                            <div>
                                                <div class="txt-s-101 cl6 p-b-10">
                                                    Confirm new password
                                                </div>
                                                <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                       type="text" name="cf-new-pw">
                                            </div>
                                        </div>
                                        <div class="flex-w p-rl-15 p-t-17">
                                            <button
                                                class="flex-c-m txt-s-105 cl0 bg10 size-a-43 hov-btn2 trans-04 p-rl-10">
                                                Save address
                                            </button>
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
