<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Update Notice</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('notice.update', $notice->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-xl-6">
                            {{-- Notice Name --}}
                            <div class="mb-3">
                                <label for="notice_name" class="form-label">Notice Name</label>
                                <input type="text" id="notice_name" name="notice_name"
                                    class="form-control"
                                    value="{{ old('notice_name', $notice->notice_name) }}">
                            </div>

                            {{-- Notice Category --}}
                            <div class="mb-3">
                                <h6 class="fs-15 mt-3">Notice Category</h6>
                                @php
                                    $selectedCategories = old('notice_category', $notice->notice_category ?? []);
                                    if (!is_array($selectedCategories)) {
                                        $selectedCategories = json_decode($selectedCategories, true) ?? [];
                                    }
                                @endphp

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" id="LatestNews" name="notice_category[]" value="Latest News"
                                        class="form-check-input"
                                        {{ in_array('Latest News', $selectedCategories) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="LatestNews">Latest News</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" id="NewsEvent" name="notice_category[]" value="News & Event"
                                        class="form-check-input"
                                        {{ in_array('News & Event', $selectedCategories) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="NewsEvent">News & Event</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" id="notices" name="notice_category[]" value="Notices"
                                        class="form-check-input"
                                        {{ in_array('Notices', $selectedCategories) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notices">Notices</label>
                                </div>
                            </div>

                            {{-- Notice Type --}}
                            <div class="mb-3">
                                <h6 class="fs-15 mt-3">Notice Type</h6>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Link" name="notice_type" value="Link" class="form-check-input"
                                        {{ old('notice_type', $notice->notice_type) == 'Link' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Link">Link</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="upload_file" name="notice_type" value="Upload File" class="form-check-input"
                                        {{ old('notice_type', $notice->notice_type) == 'Upload File' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="upload_file">Upload File</label>
                                </div>
                            </div>

                            {{-- Open In --}}
                            <div class="mb-3">
                                <h6 class="fs-15 mt-3">Open In</h6>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="new_window" name="notice_open_in" value="New"
                                        class="form-check-input"
                                        {{ old('notice_open_in', $notice->notice_open_in) == 'New' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="new_window">New Window</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="same_window" name="notice_open_in" value="Same"
                                        class="form-check-input"
                                        {{ old('notice_open_in', $notice->notice_open_in) == 'Same' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="same_window">Same Window</label>
                                </div>
                            </div>

                            {{-- New Blink --}}
                            <div class="mb-3">
                                <h6 class="fs-15 mt-3">New Blink</h6>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Yes" name="notice_blink" value="Yes"
                                        class="form-check-input"
                                        {{ old('notice_blink', $notice->notice_blink) == 'Yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="No" name="notice_blink" value="No"
                                        class="form-check-input"
                                        {{ old('notice_blink', $notice->notice_blink) == 'No' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="No">No</label>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="mb-3">
                                <h6 class="fs-15 mt-3">Status</h6>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="show" name="status" value="Show"
                                        class="form-check-input"
                                        {{ old('status', $notice->status) == 'Show' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show">Show</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="hide" name="status" value="Hide"
                                        class="form-check-input"
                                        {{ old('status', $notice->status) == 'Hide' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="hide">Hide</label>
                                </div>
                            </div>

                            {{-- Publish Date --}}
                            <div class="mb-3">
                                <label for="publish_date" class="form-label">Publish Date</label>
                                <input type="text" id="publish_date" name="notice_publish"
                                    class="form-control flatpickr-input"
                                    data-provider="flatpickr" data-date-format="Y-m-d" readonly="readonly"
                                    value="{{ old('notice_publish', $notice->notice_publish) }}">
                            </div>

                            {{-- Web Link --}}
                            <div class="mb-3 {{ old('notice_type', $notice->notice_type) == 'Link' ? '' : 'd-none' }}" id="web_link">
                                <label for="web_link" class="form-label">Web Link</label>
                                <input type="text" id="web_link" name="web_link" class="form-control"
                                    value="{{ old('web_link', $notice->custom_data['web_link']??'') }}">
                            </div>

                            {{-- Upload File --}}
                            <div class="mb-3 {{ old('notice_type', $notice->notice_type) == 'Upload File' ? '' : 'd-none' }}" id="uploadfile">
                                <label for="notice" class="form-label">Upload File</label>
                                <input type="file" id="notice" name="notice" class="form-control">

                                @if($notice->notice_type === "Upload File" && $notice->getFirstMedia('notice'))
                                    <p class="mt-2">
                                        Current File: 
                                        <a href="{{ $notice->getFirstMediaUrl('notice') }}" target="_blank">View</a>
                                    </p>
                                @endif
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