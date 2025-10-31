
@foreach($items ?? [] as $item)
    <li class="dd-item" data-id="{{ $item->id }}">
        <div class="dd-handle p-2 d-flex align-items-center justify-content-center">
            @php
                $imageUrl = $item->getFirstMediaUrl('personal-profile');
            @endphp

            @if($imageUrl)
                <img src="{{ $imageUrl }}" 
                    alt="Profile Image" 
                    class="img-fluid rounded" 
                    style="width: 100px; height: 100px; object-fit: cover;">
            @else
                <img src="https://d2er6gsnxjpdia.cloudfront.net/2/AakxHtxCoFrphTvN.png" 
                    alt="Default Image" 
                    class="img-fluid rounded" 
                    style="width: 100px; height: 100px; object-fit: contained;">
            @endif
        </div>

        <div class="dd-content text-center mt-2">
            <h6 class="mb-1">{{ $item->name }}</h6>
            <a href="{{ route('personal-profile.edit', [$item->id]) }}" 
            class="btn btn-sm btn-outline-primary"
            data-bs-toggle="tooltip" 
            title="Edit">
            Edit
            </a>
            <a href="javascript:;" 
            onclick="deleteFunction(`{{ route('personal-profile.destroy', [$item->id]) }}`)" 
            class="btn btn-sm btn-outline-danger"
            data-bs-toggle="tooltip" 
            title="Delete">
            Delete
            </a>
        </div>
    </li>

@endforeach

