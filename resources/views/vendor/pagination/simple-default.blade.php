@if ($recetas->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($recetas->onFirstPage())
                <li class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
            @else
                <li><a href="{{ $recetas->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($recetas->hasMorePages())
                <li><a href="{{ $recetas->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
            @else
                <li class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
            @endif
        </ul>
    </nav>
@endif
