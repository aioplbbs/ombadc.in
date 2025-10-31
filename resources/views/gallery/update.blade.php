<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Update Gallery</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('gallery.update', $gallery->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="caption" class="form-label">Caption</label>
                                <input type="text" id="caption" name="caption" class="form-control" value="{{old('caption', $gallery->caption)}}">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" id="slug" name="slug" class="form-control" value="{{old('slug', $gallery->slug)}}">
                            </div>
                            <div class="mb-3">
                                <label for="gallery" class="form-label">Upload File</label>
                                <input type="file" id="gallery" name="gallery[]" class="form-control" multiple>
                            </div>
                        </div>
                        <div class="col-xl-12 mb-2 row">
                            @foreach($gallery->getMedia('gallery') as $value)
                            <div class="col-md-1 me-1" style="border:1px solid lightgray;box-shadow: rgba(99, 99, 99, 0.2) 0px 1px 4px 0px;">
                                <div style="width:100%;height:70%;">
                                <img src="{{$value->getUrl('thumb')}}" alt="{{$gallery->caption}}" class="img-fluid" style="height:100%; width:100%;object-fit:contain;">
                                </div>
                                <div class="fs-20 text-danger d-flex justify-content-center"
                                    onclick="deleteFunction(`{{ route('gallery.image_destroy', ['gallery' => $gallery->id, 'gid' => $value->id]) }}`)"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <i class="ri-delete-bin-line"></i>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</x-app-layout>