
@if ($recetas->hasPages())

    <nav>
        <ul class="pagination" role="navigation">
            {{-- Previous Page Link --}}
            @if ($recetas->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icono-recetas" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                          </svg> @lang('pagination.previous')</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link mr-4" href="{{ $recetas->previousPageUrl() }}" rel="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icono-recetas" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                          </svg> @lang('pagination.previous')</a>
                </li>
            @endif

                {{-- Pagination Elements --}}
                @foreach ($recetas as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $recetas->currentPage())
                            <span aria-current="page">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                            </span>
                        @else
                            <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach





            {{-- Next Page Link --}}
            @if ($recetas->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $recetas->nextPageUrl() }}" rel="next">@lang('pagination.next')
                        <svg xmlns="http://www.w3.org/2000/svg" class="icono-recetas" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">
                        @lang('pagination.next') <svg xmlns="http://www.w3.org/2000/svg" class="icono-recetas" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg></span>
                </li>
            @endif

        </ul>

        <div>
            <p class="font-weight-bold">
                {!! __('Mostrando') !!}
                <span>{{ $recetas->firstItem() }}</span>
                {!! __('al') !!}
                <span>{{ $recetas->lastItem() }}</span>
                {!! __('de') !!}
                <span>{{ $recetas->total() }}</span>
                {!! __('resultados') !!}
            </p>
        </div>
    </nav>
@endif
