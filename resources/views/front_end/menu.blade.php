@foreach($items as $item)
    @if(isset($item['children']))
        <li class="menu-gsap dropdown dropdown-9">
            <a class="nav-link dropdown-toggle" href="{{ $item['url'] ?? 'javascript:void(0);' }}">
                {{ $item['title'] }}
            </a>
            <ul class="sub-menu" aria-labelledby="navbarDropdownMenuLink">
                @include('front_end.menu', ['items' => $item['children']])
            </ul>
        </li>
    @else
        <li class="menu-gsap">
            <a class="nav-link" href="{{ $item['url'] ?? 'javascript:void(0);' }}">
                {{ $item['title'] }}
            </a>
        </li>
    @endif
@endforeach