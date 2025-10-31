<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Add Page</h4>
            </div>
            <div class="card-body">
                <form action="{{route('page.store')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Page Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                            </div>
                            <div class="mb-3">
                                <h6 class="fs-15 mt-3">Page Type</h6>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Left" name="page_type" value="Left" class="form-check-input" {{old('page_type', 'None')=='Left'?'checked':''}}>
                                    <label class="form-check-label" for="Left">Left Content Right Image</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Right" name="page_type" value="Right" class="form-check-input" {{old('page_type', 'None')=='Right'?'checked':''}}>
                                    <label class="form-check-label" for="Right">Right Content Left Image</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Faculty" name="page_type" value="Faculty" class="form-check-input" {{old('page_type', 'None')=='Faculty'?'checked':''}}>
                                    <label class="form-check-label" for="Faculty">Faculty</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="None" name="page_type" value="None" class="form-check-input" {{old('page_type', 'None')=='None'?'checked':''}}>
                                    <label class="form-check-label" for="None">None</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Downloads" name="page_type" value="Downloads" class="form-check-input" {{old('page_type', 'None')=='Downloads'?'checked':''}}>
                                    <label class="form-check-label" for="Downloads">Downloads</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Annual-reports" name="page_type" value="Annual Reports" class="form-check-input" {{old('page_type', 'None')=='Annual Reports'?'checked':''}}>
                                    <label class="form-check-label" for="Annual-reports">Annual Reports</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Brochures" name="page_type" value="Brochures" class="form-check-input" {{old('page_type', 'None')=='Brochures'?'checked':''}}>
                                    <label class="form-check-label" for="Brochures">Brochures</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Meetings" name="page_type" value="Meetings" class="form-check-input" {{old('page_type', 'None')=='Meetings'?'checked':''}}>
                                    <label class="form-check-label" for="Meetings">Meetings</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Orders" name="page_type" value="Orders" class="form-check-input" {{old('page_type', 'None')=='Orders'?'checked':''}}>
                                    <label class="form-check-label" for="Orders">Orders</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Guidelines" name="page_type" value="Guidelines" class="form-check-input" {{old('page_type', 'None')=='Guidelines'?'checked':''}}>
                                    <label class="form-check-label" for="Guidelines">Guidelines</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Success-story" name="page_type" value="Success Story" class="form-check-input" {{old('page_type', 'None')=='Success Story'?'checked':''}}>
                                    <label class="form-check-label" for="Success-story">Success Story</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Documents" name="page_type" value="Documents" class="form-check-input" {{old('page_type', 'None')=='Documents'?'checked':''}}>
                                    <label class="form-check-label" for="Documents">Documents</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Articles" name="page_type" value="Articles" class="form-check-input" {{old('page_type', 'None')=='Articles'?'checked':''}}>
                                    <label class="form-check-label" for="Articles">Articles</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Repository" name="page_type" value="Repository" class="form-check-input" {{old('page_type', 'None')=='Repository'?'checked':''}}>
                                    <label class="form-check-label" for="Repository">Repository</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Department-website" name="page_type" value="Department Website" class="form-check-input" {{old('page_type', 'None')=='Department Website'?'checked':''}}>
                                    <label class="form-check-label" for="Department-website">Department Website</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="banner" class="form-label">Upload Banner</label>
                                    <input type="file" id="banner" name="banner" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="photo" class="form-label">Upload Photo</label>
                                    <input type="file" id="photo" name="photo" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="pdf" class="form-label">Upload PDF</label>
                                    <input type="file" id="pdf" name="pdf" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="title" class="form-label">Seo Title</label>
                                    <input type="text" id="title" name="seo['title']" class="form-control" value="{{old('seo.title')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="keywords" class="form-label">Seo Keywords</label>
                                    <input type="text" id="keywords" name="seo['keywords']" class="form-control" value="{{old('seo.keywords')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="description" class="form-label">Seo Description</label>
                                    <input type="text" id="description" name="seo['description']" class="form-control" value="{{old('seo.description')}}">
                                </div>
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