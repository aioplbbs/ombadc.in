<x-app-layout>
  <div class="page-container">
    <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <div
              class="d-flex align-items-center gap-2 justify-content-between"
            >
              <div>
                <h5
                  class="text-muted fs-13 fw-bold text-uppercase"
                  title="Total Notices"
                >
                  Total Notices
                </h5>
                <h3 class="my-2 py-1 fw-bold">1</h3>
              </div>
              <div class="avatar-xl flex-shrink-0">
                <span
                  class="avatar-title bg-primary-subtle text-primary rounded-circle fs-42"
                >
                  <iconify-icon
                    icon="solar:bill-list-bold-duotone"
                  ></iconify-icon>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card">
          <div class="card-body">
            <div
              class="d-flex align-items-center gap-2 justify-content-between"
            >
              <div>
                <h5
                  class="text-muted fs-13 fw-bold text-uppercase"
                  title="Total Faculty"
                >
                  Total Faculty
                </h5>
                <h3 class="my-2 py-1 fw-bold">
                  {{$cards['population']['total']??0}}
                </h3>
              </div>
              <div class="avatar-xl flex-shrink-0">
                <span
                  class="avatar-title bg-success-subtle text-success rounded-circle fs-42"
                >
                  <iconify-icon
                    icon="solar:wad-of-money-bold-duotone"
                  ></iconify-icon>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end col -->

      <div class="col">
        <div class="card">
          <div class="card-body">
            <div
              class="d-flex align-items-center gap-2 justify-content-between"
            >
              <div>
                <h5
                  class="text-muted fs-13 fw-bold text-uppercase"
                  title="Total Users"
                >
                  Total Users
                </h5>
                <h3 class="my-2 py-1 fw-bold">{{$cards['village']??0}}</h3>
              </div>
              <div class="avatar-xl flex-shrink-0">
                <span
                  class="avatar-title bg-warning-subtle text-warning rounded-circle fs-42"
                >
                  <iconify-icon
                    icon="solar:user-plus-bold-duotone"
                  ></iconify-icon>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end col -->

      <div class="col">
        <div class="card">
          <div class="card-body">
            <div
              class="d-flex align-items-center gap-2 justify-content-between"
            >
              <div>
                <h5
                  class="text-muted fs-13 fw-bold text-uppercase"
                  title="Total Visits"
                >
                  Total Visits
                </h5>
                <h3 class="my-2 py-1 fw-bold">{{$cards['gp']??0}}</h3>
              </div>
              <div class="avatar-xl flex-shrink-0">
                <span
                  class="avatar-title bg-info-subtle text-info rounded-circle fs-42"
                >
                  <iconify-icon
                    icon="solar:home-smile-angle-broken"
                  ></iconify-icon>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end col -->
    </div>
  </div>

  <div class="page-container">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div
            class="d-flex card-header justify-content-between align-items-center"
          >
            <div>
              <h4 class="header-title">Quick Actions</h4>
            </div>
          </div>

          <div class="card-body pt-0">
            <div>
              <div class="row">
                <div class="row">
                  <!-- Add Notice -->
                  <div class="col-12 col-md-6 mb-3">
                    <a href="#" class="text-decoration-none">
                      <div class="card text-bg-primary shadow-sm">
                        <div class="card-body d-flex align-items-center gap-3">
                          <iconify-icon
                            icon="mdi:note-plus"
                            class="display-5 text-white"
                          ></iconify-icon>
                          <div>
                            <h5 class="text-white mb-0">Add Notice</h5>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- Add Banner -->
                  <div class="col-12 col-md-6 mb-3">
                    <a href="#" class="text-decoration-none">
                      <div class="card text-bg-success shadow-sm">
                        <div class="card-body d-flex align-items-center gap-3">
                          <iconify-icon
                            icon="mdi:image-plus"
                            class="display-5 text-white"
                          ></iconify-icon>
                          <div>
                            <h5 class="text-white mb-0">Add Banner</h5>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- Add Photos -->
                  <div class="col-12 col-md-6 mb-3">
                    <a href="#" class="text-decoration-none">
                      <div class="card text-bg-warning shadow-sm">
                        <div class="card-body d-flex align-items-center gap-3">
                          <iconify-icon
                            icon="mdi:camera-plus"
                            class="display-5 text-white"
                          ></iconify-icon>
                          <div>
                            <h5 class="text-white mb-0">Add Photos</h5>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- Settings -->
                  <div class="col-12 col-md-6 mb-3">
                    <a href="#" class="text-decoration-none">
                      <div class="card text-bg-danger shadow-sm">
                        <div class="card-body d-flex align-items-center gap-3">
                          <iconify-icon
                            icon="mdi:cog-outline"
                            class="display-5 text-white"
                          ></iconify-icon>
                          <div>
                            <h5 class="text-white mb-0">Settings</h5>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>

              <!-- end row -->
            </div>
          </div>
        </div>
      </div>
      <!-- end col -->


      <!-- end col-->
    </div>
    <!-- end row -->
  </div>

  @push('script') @endpush
</x-app-layout>
