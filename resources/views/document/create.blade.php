<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Add Document</h4>
            </div>
            <div class="card-body">
                <form action="{{route('document.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="category" value="document"/>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Title</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" id="description" name="description" class="form-control" value="{{old('description')}}">
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="0">Choose catgegory</option>
                                    @php
                                        $types = config('constants.document_type');
                                    @endphp
                                    @foreach($types as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" id="date" name="file_date" class="form-control" value="{{old('file_date')}}">
                            </div>
                            <div class="mb-3">
                                <label for="document-file" class="form-label">Upload PDF file</label>
                                <input type="file" id="document-file" name="document_file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Upload Thumbnail</label>
                                <input type="file" id="thumbnail" name="thumbnail" class="form-control">
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