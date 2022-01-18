@if ($paginator->hasPages())
<nav class="pagination">
  @if(!$paginator->onFirstPage())
  <a href="{{ $paginator->previousPageUrl() }}" aria-label="predchádzajúca strana">
    <svg fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd"
        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
        clip-rule="evenodd" />
    </svg>
  </a>
  @endif

  @if($paginator->currentPage() > 4)
  <span>. . .</span>
  @endif
  @foreach(range(1, $paginator->lastPage()) as $i)
  @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
    @if ($i == $paginator->currentPage())
    <span class="active-page p-1">{{ $i }}</span>
    @else
    <a class="p-1" href="{{ $paginator->url($i) }}">{{ $i }}</a>
    @endif
    @endif
    @endforeach
    @if($paginator->currentPage() < $paginator->lastPage() - 3)
      <span>. . .</span>
      @endif

      @if ($paginator->hasMorePages())
      <a href="{{ $paginator->nextPageUrl() }}" aria-label="ďalšia strana">
        <svg fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
            clip-rule="evenodd" />
        </svg>
      </a>
      @endif
</nav>
@endif