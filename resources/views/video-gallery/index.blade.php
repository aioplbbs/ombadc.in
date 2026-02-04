<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Video Gallery List</h4>
                @can('create video-gallery')
                <a href="{{route('video-gallery.create')}}" class="btn btn-primary btn-sm" > Add Video Gallery </a>
                @endcan
            </div>
            <div class="card-body">
                <div class="row">
                @foreach($videos as $value)
                    <div class="col-sm-4 col-lg-3">
                        <!-- Simple card -->
                        <div class="card d-block">
                            <iframe width="100%" src="https://youtube.com/embed/{{ $value->code }}"></iframe>
                            <div class="card-body">
                                <h5 class="card-title">{{ $value->caption }}</h5>

                                <div class="d-flex justify-content-center">
                                    @can('update video-gallery')
                                        <a href="{{ route('video-gallery.edit', $value->id) }}" class="me-2 fs-20 p-1"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Gallery">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                    @endcan

                                    @can('delete video-gallery')
                                        <a href="javascript:;" class="fs-20 p-1 text-danger"
                                        onclick="deleteFunction(`{{ route('video-gallery.destroy', $value->id) }}`)"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    @endcan
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                @endforeach
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</x-app-layout>