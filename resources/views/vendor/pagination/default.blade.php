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
                    <a wire:click="resetPage('{{ $paginator->getPageName() }}')" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;&lsaquo;</a>
                </li>
                <li>
                    <a wire:click="previousPage('{{ $paginator->getPageName() }}')" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
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
                            @if (!$paginator->onFirstPage()) <li><a wire:click="previousPage('{{ $paginator->getPageName() }}')">{{ $page - 1}}</a></li>@endif
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                                @if ($paginator->hasMorePages())<li><a wire:click="nextPage('{{ $paginator->getPageName() }}')">{{ $page + 1}}</a></li>@endif
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a wire:click="nextPage('{{ $paginator->getPageName() }}')" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
                <li>
                    <a wire:click="setPage('{{ $paginator->lastPage() }}', '{{ $paginator->getPageName() }}')" rel="next" aria-label="@lang('pagination.next')">&rsaquo;&rsaquo;</a>
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
        <div>
            <p class="small text-muted">
                {!! __('Showing') !!}
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                {!! __('of') !!}
                <span class="fw-semibold">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>
    </nav>
@endif
