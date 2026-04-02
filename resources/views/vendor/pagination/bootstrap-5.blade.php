@if ($paginator->hasPages())
    <nav class="d-flex justify-content-between align-items-center">

        {{-- MOBILE --}}
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination mb-0">
                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                            @lang('pagination.previous')
                        </a>
                    </li>
                @endif

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                            @lang('pagination.next')
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </div>

        {{-- DESKTOP --}}
        <div class="d-none d-sm-flex flex-fill justify-content-between align-items-center">

            {{-- INFO --}}
            <div>
                <p class="small text-muted mb-0">
                    Menampilkan
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    sampai
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    dari
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    data
                </p>
            </div>

            {{-- PAGINATION --}}
            <div>
                <ul class="pagination mb-0">

                    {{-- Previous --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                                &lsaquo;
                            </a>
                        </li>
                    @endif

                    {{-- Pages --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled">
                                <span class="page-link">{{ $element }}</span>
                            </li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                                &rsaquo;
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">&rsaquo;</span>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
@endif
