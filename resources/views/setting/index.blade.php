<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Setting</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('settings.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- ✅ Nav tabs --}}
                    <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="site-tab" data-bs-toggle="tab" data-bs-target="#site" type="button" role="tab">Site Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab">Social Media</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="area-overview-tab" data-bs-toggle="tab" data-bs-target="#area-overview" type="button" role="tab">Area Overview</button>
                        </li>
                    </ul>

                    {{-- ✅ Tab content --}}
                    <div class="tab-content p-3 border border-top-0" id="settingsTabsContent">
                        
                        {{-- 🔹 Site Details Tab --}}
                        <div class="tab-pane fade show active" id="site" role="tabpanel" aria-labelledby="site-tab">
                            <div class="mb-3">
                                <label for="site_title" class="form-label">Site Title</label>
                                <input type="text" id="site_title" name="site_title" class="form-control"
                                    value="{{ old('site_title', $setting['site_title']['title'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="site_logo" class="form-label">Site Logo</label>
                                <input type="file" id="site_logo" name="site_logo" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="site_favicon" class="form-label">Site Favicon</label>
                                <input type="file" id="site_favicon" name="site_favicon" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" id="mobile" name="mobile" class="form-control"
                                    value="{{ old('mobile', $setting['mobile']['value'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email', $setting['email']['value'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" id="address" name="address" class="form-control"
                                    value="{{ old('address', $setting['address']['value'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="map" class="form-label">Map</label>
                                <textarea type="text" id="map" name="map" class="form-control"
                                    value="">{{ old('site_title', $setting['map']['value'] ?? '') }}</textarea>
                            </div>
                        </div>

                        {{-- 🔹 Social Media Tab --}}
                        <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                            <div class="mb-3">
                                <label for="social_facebook" class="form-label">Facebook</label>
                                <input type="text" id="social_facebook" name="social[facebook]" class="form-control"
                                    value="{{ old('social.facebook', $setting['social']['facebook'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="social_linkedin" class="form-label">LinkedIn</label>
                                <input type="text" id="social_linkedin" name="social[linked_in]" class="form-control"
                                    value="{{ old('social.linked_in', $setting['social']['linked_in'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="social_google" class="form-label">Google</label>
                                <input type="text" id="social_google" name="social[google]" class="form-control"
                                    value="{{ old('social.google', $setting['social']['google'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="social_twitter" class="form-label">Twitter</label>
                                <input type="text" id="social_twitter" name="social[twitter]" class="form-control"
                                    value="{{ old('social.twitter', $setting['social']['twitter'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="social_youtube" class="form-label">YouTube</label>
                                <input type="text" id="social_youtube" name="social[youtube]" class="form-control"
                                    value="{{ old('social.youtube', $setting['social']['youtube'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="social_instagram" class="form-label">Instagram</label>
                                <input type="text" id="social_instagram" name="social[instagram]" class="form-control"
                                    value="{{ old('social.instagram', $setting['social']['instagram'] ?? '') }}">
                            </div>
                        </div>

                        <div class="tab-pane fade" id="area-overview" role="tabpanel" aria-labelledby="area-overview-tab">
                            <div class="mb-3">
                                <label for="area_overview_sanctioned" class="form-label">Total Sanctioned:</label>
                                <input type="text" id="area_overview_sanctioned" name="area_overview[sanctioned]" class="form-control"
                                    value="{{ old('area_overview.sanctioned', $setting['area_overview']['sanctioned'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="area_overview_district" class="form-label">Total District:</label>
                                <input type="text" id="area_overview_district" name="area_overview[district]" class="form-control"
                                    value="{{ old('area_overview.district', $setting['area_overview']['district'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="area_overview_block" class="form-label">Total Block:</label>
                                <input type="text" id="area_overview_block" name="area_overview[block]" class="form-control"
                                    value="{{ old('area_overview.block', $setting['area_overview']['block'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="area_overview_village" class="form-label">Total Village:</label>
                                <input type="text" id="area_overview_village" name="area_overview[village]" class="form-control"
                                    value="{{ old('area_overview.village', $setting['area_overview']['village'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="area_overview_beneficiary" class="form-label">Total Benificiary:</label>
                                <input type="text" id="area_overview_beneficiary" name="area_overview[beneficiary]" class="form-control"
                                    value="{{ old('area_overview.beneficiary', $setting['area_overview']['beneficiary'] ?? '') }}">
                            </div>
                        </div>

                    </div>

                    {{-- ✅ Single Submit button --}}
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
    <script>
        // Optional: preserve active tab on reload
        document.addEventListener('DOMContentLoaded', function () {
            const triggerTabList = [].slice.call(document.querySelectorAll('#settingsTabs button'))
            triggerTabList.forEach(function (triggerEl) {
                triggerEl.addEventListener('shown.bs.tab', function (event) {
                    localStorage.setItem('activeTab', event.target.id);
                });
            });

            const activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                const someTabTriggerEl = document.querySelector(`#${activeTab}`);
                const tab = new bootstrap.Tab(someTabTriggerEl);
                tab.show();
            }
        });
    </script>
    @endpush
</x-app-layout>
