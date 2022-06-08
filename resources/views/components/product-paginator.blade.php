<div class="paginator">
    @if($paginator->previousPageUrl())
        <a href="{{ $paginator->previousPageUrl()	 }}" class="paginator__arr-link paginator__prev">
            &larr;
            <span>prev</span>
        </a>
    @endif
    <ul class="paginator__list">
        @for($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="paginator__list-item @if($paginator->currentPage() === $i) paginator__active @endif">
                <a href="{{ $paginator->url($i) }}"
                   class="paginator__list-link @if($paginator->currentPage() == $i) paginator__active-text @endif">{{ $i }}</a>
            </li>
        @endfor
    </ul>
    @if($paginator->nextPageUrl())
        <a href="{{ $paginator->nextPageUrl() }}" class="paginator__arr-link paginator__next">
            <span>next</span>
            &rarr;
        </a>
    @endif
</div>
