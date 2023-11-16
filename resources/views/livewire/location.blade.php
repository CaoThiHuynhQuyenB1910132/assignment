<div>
    <form wire:submit.prevent="newAddress">
        <div class="flex-w flex-sb">
            <div class="size-w-63 flex-t w-full-sm p-b-35">
                <div class="size-w-53 p-r-30">
                    <h5 class="txt-m-109 cl3 p-b-7">
                        Shipping address
                    </h5>
                    <p class="txt-s-100">

                        @foreach($addresses as $address)
                            <li class="flex-w flex-sb-m txt-s-101 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                                <span>
                                    {{ $address->name }}, {{ $address->phone }}, {{ $address->house_number }}, {{ $address->ward->name }},
                                    {{ $address->district->name}}, {{ $address->province->name }}
                                </span>
                                <span>
                                    <div class="fs-15 hov-cl10 pointer ">
                                        <a class="lnr lnr-cross text-danger" wire:click="deleteAddress({{$address->id}})" onclick="return confirm('Are you sure?')"> </a>
                                    </div>
                                </span>
                            </li>
                        @endforeach
                            @if(! $addresses->count())
                                <tr class="text-center">
                                    <td colspan="100%">Not have address</td>
                                </tr>
                            @endif
                    </p>
                </div>
            </div>
            <div class="size-w-63 flex-t w-full-sm p-b-35">
                <div class="size-w-53 p-r-30">
                    <h5 class="txt-m-109 cl3 p-b-7">
                        New address
                    </h5>
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
        </div>
    </form>
</div>
