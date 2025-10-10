@foreach($items as $item)
    @if($item->children->isNotEmpty())
        <li class="dd-item" data-id="{{$item->id}}">
            <div class="dd-handle">
                {{$item->title}}
            </div>
            <div class="dd-content">
                <a href="{{route('menu.edit', [$setting->id, $item->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Menu">Edit</a> | 
                <a href="javascript:;" onclick="deleteFunction(`{{route('menu.destroy', [$setting->id, $item->id])}}`)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">Delete</a>
            </div>
            <ol class="dd-list">
                @include('menu.hierarchical-list', ['items' => $item->children])
            </ol>
        </li>
    @else
        <li class="dd-item" data-id="{{$item->id}}">
            <div class="dd-handle">
                {{$item->title}}
            </div>
            <div class="dd-content">
                <a href="{{route('menu.edit', [$setting->id, $item->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Menu">Edit</a> | 
                <a href="javascript:;" onclick="deleteFunction(`{{route('menu.destroy', [$setting->id, $item->id])}}`)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">Delete</a>
            </div>
        </li>
    @endif
@endforeach