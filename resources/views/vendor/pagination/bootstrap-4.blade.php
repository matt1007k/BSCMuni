@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a href="#" class="page-link">
                <i class="mdi mdi-arrow-left"></i>
            </a>
        </li>
        @else
        <li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="@lang('pagination.previous')">
                <i class="mdi mdi-arrow-left"></i>
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
        @else
        <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="@lang('pagination.next')">
                <i class="mdi mdi-arrow-right"></i>
            </a>
        </li>
        @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <a href="#" class="page-link">
                <i class="mdi mdi-arrow-right"></i>
            </a>
        </li>
        @endif
    </ul>
</nav>
@endif