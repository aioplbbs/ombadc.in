<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Add Sector</h4>
            </div>
            <div class="card-body">
                <form action="{{route('sector.store')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Page Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="banner" class="form-label">Upload Banner</label>
                                    <input type="file" id="banner" name="banner" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="photo" class="form-label">Upload Photo</label>
                                    <input type="file" id="photo" name="photo" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="banner_id" class="form-label">Choose Banner</label>
                                    <select name="gallery[banner_id]" class="form-select" id="banner_id">
                                        <option value="">Choose Banner</option>
                                        @foreach ($banners as $banner)
                                        <option value="{{ $banner->id }}">{{ $banner->caption }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="gallery_id" class="form-label">Choose Gallery</label>
                                    <select name="gallery[gallery_id]" class="form-select" id="gallery_id">
                                        <option value="">Choose Gallery</option>
                                        @foreach ($galleries as $gallery)
                                        <option value="{{ $gallery->id }}">{{ $gallery->caption }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="title" class="form-label">Seo Title</label>
                                    <input type="text" id="title" name="seo[title]" class="form-control" value="{{old('seo.title')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="keywords" class="form-label">Seo Keywords</label>
                                    <input type="text" id="keywords" name="seo[keywords]" class="form-control" value="{{old('seo.keywords')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="description" class="form-label">Seo Description</label>
                                    <input type="text" id="description" name="seo[description]" class="form-control" value="{{old('seo.description')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="title" class="form-label">Sanctioned</label>
                                    <input type="text" id="title" name="custom[sanctioned]" class="form-control" value="{{old('custom.sanctioned')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="keywords" class="form-label">Released</label>
                                    <input type="text" id="keywords" name="custom[released]" class="form-control" value="{{old('custom.released')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="description" class="form-label">Utilized</label>
                                    <input type="text" id="description" name="custom[utilized]" class="form-control" value="{{old('custom.utilized')}}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="short_description" class="form-label"> Short Description </label>
                                <textarea name="custom[short_description]" id="short_description" class="form-control" rows="4">{{old('short_description')}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="page_content" class="form-label">Page Content </label>
                                <textarea name="page_content" id="page_content" class="form-control" rows="8">{{old('page_content')}}</textarea>
                            </div>
                        </div>
                        <div class="col-xl-3"></div>
                        <div class="col-xl-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</x-app-layout>