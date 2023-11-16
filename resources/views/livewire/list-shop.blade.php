@php
    $categories = app('categories');
@endphp

<div>
    <section class="bg0 p-t-85 p-b-45">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-4 col-lg-3 m-rl-auto p-b-50">
                    <div class="leftbar p-t-15">
                        <!--Search-->
                        <div class="size-a-21 pos-relative">
                            <input class="s-full bo-all-1 bocl15 p-rl-20" type="text" name="searchTerm" wire:key="searchTerm"
                                   placeholder="Search products..." wire:model.live.debounce.500ms="searchTerm"/>
                            <button type="submit" class="flex-c-m fs-18 size-a-22 ab-t-r hov11">
                                <img class="hov11-child trans-04" src="client/new/images/icons/icon-search.png" alt="ICON">
                            </button>
                        </div>
                        <!--Search Category-->
                        <div class="p-t-40">
                            <h4 class="txt-m-101 cl3 p-b-37">
                                Categories
                            </h4>
                            <ul>
                                <li class="p-b-5">
                                    @foreach($categories as $key => $category)
                                        <div class="form-check" wire:key="{{ $category->name }}-{{ $key }}">
                                            <input
                                                wire:model.live="sortTerm"
                                                class="form-check-input"
                                                type="checkbox"
                                                value="{{ $category->id }}"
                                                id="{{ $key }}-{{ $category->name }}"
                                            >

                                            <label class="form-check-label" for="{{ $key }}-{{ $category->name }}">
                                                <span class="m-r-10">{{ $category->name }}</span>
                                                <span>{{ $category->products->count() }}</span>
                                            </label>

                                        </div>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <!--Search best product-->
                        <div class="p-t-40">
                            <h4 class="txt-m-101 cl3 p-b-37">
                                Best sellers
                            </h4>
                            <ul>
                                <li class="flex-w flex-sb-t p-b-30">
                                    @foreach($prs as $key => $product)
                                        <div wire:key="product-{{ $product->name }}">
                                            <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="size-w-50 wrap-pic-w bo-all-1 bocl12 hov8 trans-04 my-3">
                                                <img src="{{ $product->productImages->count() ? asset('storage/' . $product->productImages[0]->image) : '' }}" alt="{{ $product->name }}">
                                            </a>
                                            <div class="size-w-51 flex-col-l p-t-12">
                                                <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-12">
                                                    {{ $product->name }}
                                                </a>
                                                <span class="txt-m-104 cl9">
                                                    {{ $product->selling_price }}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-9 m-rl-auto p-b-50">
                    <div>
                        <div class="flex-w flex-r-m p-b-45 flex-row-rev">
                            <div class="flex-w flex-m p-tb-8 ml-auto">
                                <div class="flex-w cl9 flex-m m-tb-15 m-r-15">
                                    <div class="txt-s-101 cl9 m-r-30 size-w-53">
                                        <select wire:model.live="sortBy" name="sortBy" wire:key="sortBy" class="form-select">
                                            <option value="">Sort By</option>
                                            <option value="highToLow">Sort by high to low</option>
                                            <option value="lowToHigh">Sort by low to high</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-grid">
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-sm-6 col-lg-4 p-b-30" wire:key="same-{{ $product->name }}">
                                        <div class="block1">
                                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">

                                                <img src="{{ $product->productImages->count() ? asset('storage/' . $product->productImages[0]->image) : '' }}" alt="{{ $product->name }}">

                                                <div class="block1-content flex-col-c-m p-b-46">
                                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}"
                                                       class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                                        {{ $product->name }}
                                                    </a>

                                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                                            {{ CurrencyHelper::format($product->selling_price) }}
                                                        </span>

                                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                                        <a href="{{ route('product.detail', ['id' => $product->id]) }}"
                                                           class="block1-icon flex-c-m wrap-pic-max-w">
                                                            <img src="client/new/images/icons/icon-view.png" alt="ICON">
                                                        </a>

                                                        <div wire:ignore.self>
                                                            <livewire:add-cart-component :productId="$product->id" wire:key="addToCart-{{ $key }}-{{ $product->name }}-{{ $product->id }}"></livewire:add-cart-component>
                                                        </div>

                                                        <div wire:ignore.self>
                                                            <livewire:wishlist-component :productId="$product->id" wire:key="addToWishList-{{ $key }}-{{ $product->name }}-{{ $product->id }}"></livewire:wishlist-component>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if(! $products->count())
                                    <tr class="text-center">
                                        <td colspan="100%">Not have products</td>
                                    </tr>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
