<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Banner List</h4>
                @can('create banner')
                <a href="{{route('banner.create')}}" class="btn btn-primary btn-sm" > Add Banner </a>
                @endcan
            </div>
            <div class="card-body">
                
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($data->getMedia('banner')))
                            @foreach($data->getMedia('banner') as $key => $media)
                            <tr>
                                <td>
                                    <a href="{{ $media->getUrl() }}" target="_blank"><img src="{{ $media->getUrl('thumb') }}" width="300" class="me-lg-2 d-flex" alt="{{ $media->name }}"></a>
                                </td>
                                <td>{{ $media->getCustomProperty('name') }}</td>
                                <td>
                                    @if($media->getCustomProperty('status') == 'Show')
                                    <span class="badge bg-primary">{{ $media->getCustomProperty('status') }}</span>
                                    @else
                                    <span class="badge bg-danger">{{ $media->getCustomProperty('status') }}</span>
                                    @endif
                                </td>
                                <td class="text-center text-muted">
                                    @can('update banner')
                                        <a href="{{ route('banner.edit', $media->id) }}" class="me-2 fs-20 p-1"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Gallery">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                    @endcan

                                    @can('delete banner')
                                        <a href="javascript:;" class="fs-20 p-1 text-danger"
                                        onclick="deleteFunction(`{{ route('banner.destroy', $media->id) }}`)"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</x-app-layout>