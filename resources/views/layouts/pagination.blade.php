@if ($paginator->hasPages())
  <ul class="uk-dotnav">


        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled page-item"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="uk-disabled"><span>{{ $page }}</span></li>
                    @else
                        <li class="uk-active"><a href="{{ $url }}" class="uk-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


    </ul>
@endif
