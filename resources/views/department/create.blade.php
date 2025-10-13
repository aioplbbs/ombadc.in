<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Add Department</h4>
            </div>
            <div class="card-body">
                <form action="{{route('department.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="parent" class="form-label">Sector</label>
                                <select name="page_id" id="parent" class="form-control">
                                    <option value="0">Choose Sector</option>
                                    @if(!empty($pages))
                                    @foreach($pages as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Department Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="short_name" class="form-label">Short Name</label>
                                    <input type="text" id="short_name" name="short_name" class="form-control" value="{{old('short_name')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="title" class="form-label">Sanctioned</label>
                                    <input type="text" id="title" name="sanctioned" class="form-control" value="{{old('sanctioned')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="keywords" class="form-label">Released</label>
                                    <input type="text" id="keywords" name="released" class="form-control" value="{{old('released')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="description" class="form-label">Utilized</label>
                                    <input type="text" id="description" name="utilized" class="form-control" value="{{old('utilized')}}">
                                </div>
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