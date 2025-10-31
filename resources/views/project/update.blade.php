<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Update Project</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('project.update', $project->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="parent" class="form-label">Sector</label>
                                    <select id="parent" class="form-control">
                                        <option value="0">Choose Sector</option>
                                        @if(!empty($pages))
                                        @foreach($pages as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="department" class="form-label">Department</label>
                                    <select name="department_id" id="department" class="form-control">
                                        <option value="0">Choose Department</option>
                                        @if(!empty($departments))
                                        @foreach($departments as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Project Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{old('name', $project->name)}}">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="title" class="form-label">Sanctioned</label>
                                    <input type="text" id="title" name="sanctioned" class="form-control" value="{{old('sanctioned', $project->sanctioned)}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="keywords" class="form-label">Released</label>
                                    <input type="text" id="keywords" name="released" class="form-control" value="{{old('released', $project->released)}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="description" class="form-label">Utilized</label>
                                    <input type="text" id="description" name="utilized" class="form-control" value="{{old('utilized', $project->utilized)}}">
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

    @push('script')
    <script>
        $(document).ready(function () {
            $('#parent').on('change', function () {
                const pageId = $(this).val();

                if (pageId && pageId != 0) {
                    $.ajax({
                        url: "{{ route('project.department') }}",
                        type: "POST",
                        data: {
                            page_id: pageId,
                            _token: "{{ csrf_token() }}", // important for Laravel POST
                        },
                        beforeSend: function () {
                            console.log("Loading departments...");
                        },
                        success: function (response) {
                            console.log("Response:", response);
                            // Example: populate another dropdown
                            $('#department').empty();
                            $('#department').append('<option value="0">Choose Department</option>');
                            $.each(response, function(key, value) {
                                $('#department').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                        error: function (xhr) {
                            console.error("Error:", xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
    @endpush
</x-app-layout>