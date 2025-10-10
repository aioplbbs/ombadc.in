<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Add Banner</h4>
            </div>
            <div class="card-body">
                <form action="{{route('banner.update', $media->id)}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$media->getCustomProperty('name')}}">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="0">Choose Status</option>
                                <option value="Show" {{($media->getCustomProperty('status')=="Show"?"selected":"")}}>Show</option>
                                <option value="Hide" {{($media->getCustomProperty('status')=="Hide"?"selected":"")}}>Hide</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Banner</label>
                            <input type="file" id="name" name="banner" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <img src="{{ $media->getUrl() }}" class="img-fluid me-lg-2 d-flex" alt="{{ $media->name }}">
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