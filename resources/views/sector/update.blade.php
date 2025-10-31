<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Update Page</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('sector.update', $sector->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Page Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $sector->name) }}">
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $sector->slug) }}">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="banner" class="form-label">Upload Banner</label>
                                    <input type="file" id="banner" name="banner" class="form-control">
                                    @if($media = $sector->getFirstMedia('page_banner'))
                                        <div class="position-relative">
                                            <img src="{{ $media->getUrl() }}" class="img-thumbnail mt-2" width="120">
                                            <div class="fs-20 text-danger "
                                                onclick="deleteFunction(`{{ route('page.image_destroy', ['page' => $sector->id, 'gid' => $media->id]) }}`)"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="ri-delete-bin-line"></i>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="photo" class="form-label">Upload Photo</label>
                                    <input type="file" id="photo" name="photo" class="form-control">
                                    @if($media = $sector->getFirstMedia('page_photo'))
                                        <div class="position-relative" style="width:120px;">
                                            <img src="{{ $media->getUrl() }}" class="img-thumbnail mt-2" width="120">
                                            <div class="fs-17 text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary"
                                                onclick="deleteFunction(`{{ route('page.image_destroy', ['page' => $sector->id, 'gid' => $media->id]) }}`)"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="ri-delete-bin-line"></i>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @php
                            $gallery_data = $sector->customData()->where('name', 'sector_data')->first()->data;
                            @endphp

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="banner_id" class="form-label">Choose Banner</label>
                                    <select name="gallery[banner_id]" class="form-select" id="banner_id">
                                        <option value="">Choose Banner</option>
                                        @foreach ($galleries as $gallery)
                                        <option value="{{ $gallery->id }}">{{ $gallery->caption }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="gallery_id" class="form-label">Choose Photo</label>
                                    <select name="gallery[gallery_id]" class="form-select" id="gallery_id">
                                        <option value="">Choose Photo</option>
                                        @foreach ($galleries as $gallery)
                                        <option value="{{ $gallery->id }}">{{ $gallery->caption }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="title" class="form-label">Seo Title</label>
                                    <input type="text" id="title" name="seo[title]" class="form-control" 
                                        value="{{ old('seo.title', $sector->seo['title'] ?? '') }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="keywords" class="form-label">Seo Keywords</label>
                                    <input type="text" id="keywords" name="seo[keywords]" class="form-control" 
                                        value="{{ old('seo.keywords', $sector->seo['keywords'] ?? '') }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="description" class="form-label">Seo Description</label>
                                    <input type="text" id="description" name="seo[description]" class="form-control" 
                                        value="{{ old('seo.description', $sector->seo['description'] ?? '') }}">
                                </div>
                            </div>
                            @php
                            $sector_data = $sector->customData()->where('name', 'sector_data')->first()->data;
                            @endphp
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="title" class="form-label">Sanctioned</label>
                                    <input type="text" id="title" name="custom[sanctioned]" class="form-control" value="{{old('custom.sanctioned', $sector_data['sanctioned']??'')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="keywords" class="form-label">Released</label>
                                    <input type="text" id="keywords" name="custom[released]" class="form-control" value="{{old('custom.released', $sector_data['released']??'')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="description" class="form-label">Utilized</label>
                                    <input type="text" id="description" name="custom[utilized]" class="form-control" value="{{old('custom.utilized', $sector_data['utilized']??'')}}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="page_content" class="form-label">Page Content </label>
                                <textarea name="page_content" id="page_content" class="form-control" rows="8">{{ old('page_content', $sector->page_content) }}</textarea>
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