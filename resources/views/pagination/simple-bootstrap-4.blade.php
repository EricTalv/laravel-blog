@if ($paginator->hasPages())
    <nav class="blog-pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="btn btn-outline-secondary disabled" aria-disabled="true">
                    Newer
                </a>
            @else
                <a class="btn btn-outline-primary" href="{{ $paginator->previousPageUrl() }}" rel="prev">Newer</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="btn btn-outline-primary " href="{{ $paginator->nextPageUrl() }}" rel="next">Older</a>
            @else
                <a class="btn btn-outline-secondary disabled" aria-disabled="true"></a>
            @endif
    </nav>
@endif
