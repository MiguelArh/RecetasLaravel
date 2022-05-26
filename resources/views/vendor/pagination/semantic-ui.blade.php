@if ($recetas->hasPages())
    <div class="ui pagination menu" role="navigation">
        {{-- Previous Page Link --}}
        @if ($recetas->onFirstPage())
            <a class="icon item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')"> <i class="left chevron icon"></i> </a>
        @else
            <a class="icon item" href="{{ $recetas->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> <i class="left chevron icon"></i> </a>
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
            <a class="icon item" href="{{ $recetas->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class="right chevron icon"></i> </a>
        @else
            <a class="icon item disabled" aria-disabled="true" aria-label="@lang('pagination.next')"> <i class="right chevron icon"></i> </a>
        @endif
    </div>
@endif
