<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Setting</h4>
            </div>
            <div class="card-body">
                <form action="{{route('settings.store')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <h4>Site Details</h4>
                            <div class="mb-3">
                                <label for="site_title" class="form-label">Site Title</label>
                                <input type="text" id="site_title" name="site_title" class="form-control" value="{{old('site_title', $setting['site_title']['title']??'')}}">
                            </div>
                            <div class="mb-3 {{old('site_logo')}}">
                                <label for="site_logo" class="form-label">Site Logo</label>
                                <input type="file" id="site_logo" name="site_logo" class="form-control">
                            </div>
                            <div class="mb-3 {{old('site_favicon')}}">
                                <label for="site_favicon" class="form-label">Site Favicon</label>
                                <input type="file" id="site_favicon" name="site_favicon" class="form-control">
                            </div>
                            <h4>Social Media</h4>
                            <div class="mb-3">
                                <label for="social" class="form-label">Facebook</label>
                                <input type="text" id="social" name="social[facebook]" class="form-control" value="{{old('social.facebook', $setting['social']['facebook']??'')}}">
                            </div>
                            <div class="mb-3">
                                <label for="social" class="form-label">Linked In</label>
                                <input type="text" id="social" name="social[linked_in]" class="form-control" value="{{old('social.linked_in', $setting['social']['linked_in']??'')}}">
                            </div>
                            <div class="mb-3">
                                <label for="social" class="form-label">Google</label>
                                <input type="text" id="social" name="social[google]" class="form-control" value="{{old('social.google', $setting['social']['google']??'')}}">
                            </div>
                            <div class="mb-3">
                                <label for="social" class="form-label">Twitter</label>
                                <input type="text" id="social" name="social[twitter]" class="form-control" value="{{old('social.twitter', $setting['social']['twitter']??'')}}">
                            </div>
                            <div class="mb-3">
                                <label for="social" class="form-label">Youtube</label>
                                <input type="text" id="social" name="social[youtube]" class="form-control" value="{{old('social.youtube', $setting['social']['youtube']??'')}}">
                            </div>
                            <div class="mb-3">
                                <label for="social" class="form-label">Instagram</label>
                                <input type="text" id="social" name="social[instagram]" class="form-control" value="{{old('social.instagram', $setting['social']['instagram']??'')}}">
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
    </script>
    @endpush
</x-app-layout>