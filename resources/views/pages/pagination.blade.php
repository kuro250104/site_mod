@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{-- <li class="disabled paginate_button page-item previous" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">Précédent</span>
                </li> --}}
            @else
                <li class="paginate_button page-item previous">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Précédent</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled paginate_button page-item " aria-disabled="true"><a class="page-link" >{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active paginate_button page-item " aria-current="page"><a class="page-link" >{{ $page }}</a></li>
                        @else
                            <li class="paginate_button page-item "><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginate_button page-item next">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Suivant</a>
                </li>
            {{-- @else
                <li class="disabled paginate_button page-item next" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">Suivant</span>
                </li> --}}
            @endif
        </ul>
    </nav>
@endif


