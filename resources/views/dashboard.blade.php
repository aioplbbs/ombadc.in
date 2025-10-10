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

      <div class="col-6">
        <div class="card card-h-100">
          <div class="card-header d-flex flex-wrap align-items-center gap-2">
            <h4 class="header-title me-auto">Our Faculities</h4>
          </div>

          <div class="card-body p-0">

            <div class="table-responsive">
              <table
                class="table table-custom table-centered table-sm table-nowrap table-hover mb-0"
              >
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="avatar-md flex-shrink-0 me-2">
                          <span
                            class="avatar-title bg-primary-subtle rounded-circle"
                          >
                            <img
                              src="assets/images/users/avatar-1.jpg"
                              alt=""
                              height="26"
                              class="rounded-circle"
                            />
                          </span>
                        </div>
                        <div>
                          <span class="text-muted fs-12">Name</span> <br />
                          <h5 class="fs-14 mt-1">Prabhusagar</h5>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span class="text-muted fs-12">Department</span> <br />
                      <h5 class="fs-14 mt-1 fw-normal">MTech.</h5>
                    </td>
                    <td>
                      <span class="text-muted fs-12">Status</span>
                      <h5 class="fs-14 mt-1 fw-normal">
                        <i class="ri-circle-fill fs-12 text-success"></i> Active
                      </h5>
                    </td>
                    <td style="width: 30px">
                      <div class="dropdown">
                        <a
                          href="#"
                          class="dropdown-toggle text-muted drop-arrow-none card-drop p-0"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                        >
                          <i class="ri-more-2-fill"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="javascript:void(0);" class="dropdown-item"
                            >View Profile</a
                          >
                          <a href="javascript:void(0);" class="dropdown-item"
                            >Deactivate</a
                          >
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="avatar-md flex-shrink-0 me-2">
                          <span
                            class="avatar-title bg-secondary-subtle rounded-circle"
                          >
                            <img
                              src="assets/images/users/avatar-3.jpg"
                              alt=""
                              height="26"
                              class="rounded-circle"
                            />
                          </span>
                        </div>
                        <div>
                          <span class="text-muted fs-12">Name</span> <br />
                          <h5 class="fs-14 mt-1">Michael Brown</h5>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span class="text-muted fs-12">Department</span> <br />
                      <h5 class="fs-14 mt-1 fw-normal">Msc</h5>
                    </td>
                    <td>
                      <span class="text-muted fs-12">Status</span>
                      <h5 class="fs-14 mt-1 fw-normal">
                        <i class="ri-circle-fill fs-12 text-danger"></i>
                        Inactive
                      </h5>
                    </td>
                    <td style="width: 30px">
                      <div class="dropdown">
                        <a
                          href="#"
                          class="dropdown-toggle text-muted drop-arrow-none card-drop p-0"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                        >
                          <i class="ri-more-2-fill"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="javascript:void(0);" class="dropdown-item"
                            >Activate</a
                          >
                          <a href="javascript:void(0);" class="dropdown-item"
                            >Delete</a
                          >
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- end table-responsive-->
          </div>
          <!-- end card-body-->

          <div class="card-footer">
            <div
              class="align-items-center justify-content-between row text-center text-sm-start"
            >
              <div class="col-sm">
                <div class="text-muted">
                  Showing <span class="fw-semibold">5</span> of
                  <span class="fw-semibold">2596</span> Users
                </div>
              </div>
              <div class="col-sm-auto mt-3 mt-sm-0">
                <ul
                  class="pagination pagination-boxed pagination-sm mb-0 justify-content-center"
                >
                  <li class="page-item disabled">
                    <a href="#" class="page-link"
                      ><i class="ri-arrow-left-s-line"></i
                    ></a>
                  </li>
                  <li class="page-item active">
                    <a href="#" class="page-link">1</a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link">2</a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link"
                      ><i class="ri-arrow-right-s-line"></i
                    ></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- -->
          </div>
        </div>
        <!-- end card-->
      </div>
      <!-- end col-->
    </div>
    <!-- end row -->
  </div>

  @push('script') @endpush
</x-app-layout>
