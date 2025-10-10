@foreach($items as $item)
    @if(isset($item['children']))
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ $item['url'] }}">
                {{ $item['title'] }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @include('front_end.menu', ['items' => $item['children']])
            </ul>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ $item['url'] }}">
                {{ $item['title'] }}
            </a>
        </li>
    @endif
@endforeach