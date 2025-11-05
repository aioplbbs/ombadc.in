<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Add Notice</h4>
            </div>
            <div class="card-body">
                <form action="{{route('notice.store')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="notice_name" class="form-label">Notice Name</label>
                                <input type="text" id="notice_name" name="notice_name" class="form-control" value="{{old('notice_name')}}">
                            </div>
                            <div class="mb-3">
                                <h6 class="fs-15 mt-3">Notice Category</h6>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" id="LatestNews" name="notice_category[]" value="Latest News" class="form-check-input" checked {{ in_array('Latest News', old('notice_category', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="LatestNews">Latest News</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" id="NewsEvent" name="notice_category[]" value="News & Event" class="form-check-input" {{ in_array('News & Event', old('notice_category', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="NewsEvent">News & Event</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" id="notices" name="notice_category[]" value="Notices" class="form-check-input" {{ in_array('Notices', old('notice_category', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notices">Notices</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" id="tender" name="notice_category[]" value="Tender" class="form-check-input" {{ in_array('Tender', old('notice_category', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tender">Tender</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6 class="fs-15 mt-3">Notice Type</h6>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Link" name="notice_type" value="Link" class="form-check-input" {{old('notice_type', 'Upload File')=='Link'?'checked':''}}>
                                    <label class="form-check-label" for="Link">Link</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="upload_file" name="notice_type" value="Upload File" class="form-check-input" {{old('notice_type', 'Upload File')=='Upload File'?'checked':''}}>
                                    <label class="form-check-label" for="upload_file">Upload File</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6 class="fs-15 mt-3">Open In</h6>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="new_window" name="notice_open_in" value="New" class="form-check-input" checked {{old('notice_open_in')=='New'?'checked':''}}>
                                    <label class="form-check-label" for="new_window">New Window</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="same_window" name="notice_open_in" value="Same" class="form-check-input" {{old('notice_open_in')=='Same'?'checked':''}}>
                                    <label class="form-check-label" for="same_window">Same Window</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6 class="fs-15 mt-3">New Blink</h6>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Yes" name="notice_blink" value="Yes" class="form-check-input" checked {{old('notice_blink')=='1'?'checked':''}}>
                                    <label class="form-check-label" for="Yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="No" name="notice_blink" value="No" class="form-check-input" {{old('notice_blink')=='0'?'checked':''}}>
                                    <label class="form-check-label" for="No">No</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="publish_date" class="form-label">Publish Date</label>
                                <input type="text" id="publish_date" name="notice_publish" class="form-control flatpickr-input" data-provider="flatpickr" data-date-format="Y-m-d" readonly="readonly" value="{{old('notice_publish')}}">
                            </div>
                            <div class="mb-3 {{old('notice_type', 'Upload File')=='Link'?'':'d-none'}}" id="web_link">
                                <label for="web_link" class="form-label">Web Link</label>
                                <input type="text" id="web_link" name="web_link" class="form-control">
                            </div>
                            <div class="mb-3 {{old('notice_type', 'Upload File')=='Upload File'?'':'d-none'}}" id="uploadfile">
                                <label for="notice" class="form-label">Upload File</label>
                                <input type="file" id="notice" name="notice" class="form-control">
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
        $("input[name='notice_type']").on('change', function(){
            var notice_type = $(this).val();
            if(notice_type == "Link"){
                $("#web_link").removeClass('d-none');
                $("#uploadfile").addClass('d-none');
            }else{
                $("#uploadfile").removeClass('d-none');
                $("#web_link").addClass('d-none');
            }
        });
    </script>
    @endpush
</x-app-layout>