<ul class="pagination justify-content-center pagination-xsm m-0">
    @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class=""
               href="#"
               aria-label="Previous">
                <i class="bi bi-arrow-left"></i>
            </a>
        </li>
    @else
        <li class="page-item">
            <a class=""
               href="{{ $paginator->previousPageUrl() }}"
               aria-label="Previous">
                <i class="bi bi-arrow-left"></i>
            </a>
        </li>
    @endif
    @if($elements > 1)

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item">
                    <a class=""
                       href="#"
                       aria-label="Page 1">
                        <span>{{ $element }}</span>
                    </a>
                </li>
            @endif
            @if(is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item ">
                            <a class="active"
                               href="#"
                               aria-label="Page 1">
                                <span>{{ $page }}</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class=""
                               href="{{ $url }}"
                               aria-label="Page 1">
                                <span>{{ $page }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class=""
                   href="{{ $paginator->nextPageUrl() }}"
                   aria-label="Next">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <a class=""
                   href=""
                   aria-label="Next">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </li>
        @endif
    @endif
</ul>
