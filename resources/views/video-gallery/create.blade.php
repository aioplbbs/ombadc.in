<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Add Video Gellery</h4>
            </div>
            <div class="card-body">
                <form action="{{route('video-gallery.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Caption</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                            </div>
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" id="caption" name="code" class="form-control" value="{{old('code')}}">
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