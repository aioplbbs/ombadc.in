<li>
    <a href="{{ $item['url'] ?? 'javascript:void(0)' }}"
       @if(!empty($item['new_window']) && $item['new_window'] == 1) target="_blank" @endif
       data-title="{{ $item['title'] ?? '' }}">
       {{ $item['title'] ?? '' }}
    </a>

    @if (!empty($item['children']))
        <ul>
            @foreach ($item['children'] as $child)
                @include('layouts.partials.menu-item', ['item' => $child])
            @endforeach
        </ul>
    @endif
</li>
