<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Add Gallery</h4>
            </div>
            <div class="card-body">
                <form action="{{route('gallery.store')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="caption" class="form-label">Caption</label>
                                <input type="text" id="caption" name="caption" class="form-control" value="{{old('caption')}}">
                            </div>
                            <div class="mb-3">
                                <label for="gallery" class="form-label">Upload File</label>
                                <input type="file" id="gallery" name="gallery[]" class="form-control" multiple>
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