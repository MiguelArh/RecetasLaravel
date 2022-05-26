@if ($recetas->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($recetas->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $recetas->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

             {{-- Pagination Elements --}}
        @foreach ($recetas as $receta)
        {{-- "Three Dots" Separator --}}
        @if (is_string($receta))
            <a class="icon item disabled" aria-disabled="true">{{ $receta }}</a>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($receta))
            @foreach ($receta as $page => $url)
                @if ($page == $recetas->currentPage())
                    <a class="item active" href="{{ $url }}" aria-current="page">{{ $page }}</a>
                @else
                    <a class="item" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

            {{-- Next Page Link --}}
            @if ($recetas->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $recetas->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
