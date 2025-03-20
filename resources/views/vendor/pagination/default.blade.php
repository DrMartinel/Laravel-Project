@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;&lsaquo;</span>
                </li>
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->url(1)}}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;&lsaquo;</a>
                </li>
                <li>
                    <a href="{{ $paginator->previousPageUrl()}}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
{{--                @if (is_string($element))--}}
{{--                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>--}}
{{--                @endif--}}

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            @if (!$paginator->onFirstPage()) <li><a href="{{ $paginator->previousPageUrl()}}">{{ $page - 1}}</a></li>@endif
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                                @if ($paginator->hasMorePages())<li><a href="{{ $paginator->nextPageUrl()}}">{{ $page + 1}}</a></li>@endif
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
                <li>
                    <a href="{{ $paginator->url($paginator->lastPage()) }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
