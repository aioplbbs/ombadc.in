<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Update Page</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('page.update', $page->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Page Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $page->name) }}">
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $page->slug) }}">
                            </div>

                            <div class="mb-3">
                                <h6 class="fs-15 mt-3">Page Type</h6>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Left" name="page_type" value="Left" class="form-check-input" 
                                        {{ old('page_type', $page->page_type) == 'Left' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Left">Left Content Right Image</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Right" name="page_type" value="Right" class="form-check-input" 
                                        {{ old('page_type', $page->page_type) == 'Right' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Right">Right Content Left Image</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Faculty" name="page_type" value="Faculty" class="form-check-input" 
                                        {{ old('page_type', $page->page_type) == 'Faculty' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Faculty">Faculty</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="None" name="page_type" value="None" class="form-check-input" 
                                        {{ old('page_type', $page->page_type) == 'None' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="None">None</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="banner" class="form-label">Upload Banner</label>
                                    <input type="file" id="banner" name="banner" class="form-control">
                                    @if($media = $page->getFirstMedia('page_banner'))
                                        <div class="position-relative">
                                            <img src="{{ $media->getUrl() }}" class="img-thumbnail mt-2" width="120">
                                            <div class="fs-20 text-danger "
                                                onclick="deleteFunction(`{{ route('page.image_destroy', ['page' => $page->id, 'gid' => $media->id]) }}`)"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="ri-delete-bin-line"></i>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="photo" class="form-label">Upload Photo</label>
                                    <input type="file" id="photo" name="photo" class="form-control">
                                    @if($media = $page->getFirstMedia('page_photo'))
                                        <div class="position-relative" style="width:120px;">
                                            <img src="{{ $media->getUrl() }}" class="img-thumbnail mt-2" width="120">
                                            <div class="fs-17 text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary"
                                                onclick="deleteFunction(`{{ route('page.image_destroy', ['page' => $page->id, 'gid' => $media->id]) }}`)"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="ri-delete-bin-line"></i>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="pdf" class="form-label">Upload PDF</label>
                                    <input type="file" id="pdf" name="pdf" class="form-control">
                                    @if($media = $page->getFirstMedia('page_pdf'))
                                        <div class="position-relative" style="width:120px;">
                                            <a href="{{ $media->getUrl() }}">View PDF</a>
                                            <div class="fs-17 text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary"
                                                onclick="deleteFunction(`{{ route('page.image_destroy', ['page' => $page->id, 'gid' => $media->id]) }}`)"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="ri-delete-bin-line"></i>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="title" class="form-label">Seo Title</label>
                                    <input type="text" id="title" name="seo[title]" class="form-control" 
                                        value="{{ old('seo.title', $page->seo['title'] ?? '') }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="keywords" class="form-label">Seo Keywords</label>
                                    <input type="text" id="keywords" name="seo[keywords]" class="form-control" 
                                        value="{{ old('seo.keywords', $page->seo['keywords'] ?? '') }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="description" class="form-label">Seo Description</label>
                                    <input type="text" id="description" name="seo[description]" class="form-control" 
                                        value="{{ old('seo.description', $page->seo['description'] ?? '') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="page_content" class="form-label">Page Content </label>
                                <textarea name="page_content" id="page_content" class="form-control" rows="8">{!! old('page_content', $page->page_content) !!}</textarea>
                            </div>
                        </div>

                        <div class="col-xl-3"></div>
                        <div class="col-xl-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</x-app-layout>