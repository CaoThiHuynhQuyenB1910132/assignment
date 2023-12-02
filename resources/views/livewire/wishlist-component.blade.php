<div>
    <div class="block1-icon flex-c-m wrap-pic-max-w">
        <button wire:click="addToWishList({{ $productId }})" type="button">
            @if(in_array($productId, $wishlist))
                <img class="icon-addedwish-b1 "
                     src="{{ asset('client/new/images/icons/icon-heart2.png') }}" alt="ICON">
            @else
                <img class="icon-addwish-b1" src="{{ asset('client/new/images/icons/icon-heart.png') }}"
                     alt="ICON">
            @endif
        </button>
    </div>
</div>
