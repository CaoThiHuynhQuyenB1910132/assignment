@if($paginator->hasPages())
    <div class="flex-w flex-c-m p-t-47">
        @if (! $paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}"
               class="flex-c-m txt-s-115 cl6 size-a-24 how-btn1 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3 p-b-1">
                <span class="lnr lnr-chevron-left m-t-3 m-l-7"></span>
                <span class="lnr lnr-chevron-left m-t-3"></span>
                Previous
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="flex-c-m txt-s-115 cl6 size-a-23 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3{{ $element === '...' ? ' p-b-1' : '' }}">
                {{ $element }}
            </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <a href="{{ $url }}"
                       class="flex-c-m txt-s-115 cl6 size-a-23 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3{{ $page === $paginator->currentPage() ? ' active-pagi1' : '' }}">
                        {{ $page }}
                    </a>
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="flex-c-m txt-s-115 cl6 size-a-24 how-btn1 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3 p-b-1">
                Next
                <span class="lnr lnr-chevron-right m-t-3 m-l-7"></span>
                <span class="lnr lnr-chevron-right m-t-3"></span>
            </a>
        @endif
    </div>
@endif
