@if ($paginator->hasPages())
    <nav class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0">
        <div class="-mt-px flex w-0 flex-1">
            @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="inline-flex items-center group border-t-2 border-transparent pr-1 pt-4 text-sm font-medium text-white hover:border-primary hover:text-primary">
                    <svg class="mr-3 size-5 group-hover:text-primary" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M18 10a.75.75 0 0 1-.75.75H4.66l2.1 1.95a.75.75 0 1 1-1.02 1.1l-3.5-3.25a.75.75 0 0 1 0-1.1l3.5-3.25a.75.75 0 1 1 1.02 1.1l-2.1 1.95h12.59A.75.75 0 0 1 18 10Z"
                            clip-rule="evenodd" />
                    </svg>
                    Predošlá strana
                </a>
            @endif
        </div>
        <div class="hidden md:-mt-px md:flex">
            @foreach (range(max(1, $paginator->currentPage() - 3), min($paginator->lastPage(), $paginator->currentPage() + 3)) as $i)
                @if ($i == $paginator->currentPage())
                    <a href="#"
                        class="inline-flex items-center border-t-2 border-primary px-4 pt-4 text-sm font-medium text-primary"
                        aria-current="page">{{ $i }}</a>
                @else
                    <a href="{{ $paginator->url($i) }}"
                        class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-white hover:border-gray-300 hover:text-gray-700">{{ $i }}</a>
                @endif
            @endforeach
        </div>
        <div class="-mt-px flex w-0 flex-1 justify-end">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="inline-flex items-center group border-t-2 border-transparent pl-1 pt-4 text-sm font-medium text-white hover:border-primary hover:text-primary">
                    Ďalšia strana
                    <svg class="ml-3 size-5 text-white group-hover:text-primary" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M2 10a.75.75 0 0 1 .75-.75h12.59l-2.1-1.95a.75.75 0 1 1 1.02-1.1l3.5 3.25a.75.75 0 0 1 0 1.1l-3.5 3.25a.75.75 0 1 1-1.02-1.1l2.1-1.95H2.75A.75.75 0 0 1 2 10Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            @endif
        </div>
    </nav>
@endif
