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
                <h3 class="my-2 py-1 fw-bold">0</h3>
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
      <!-- end col -->
      <!-- end col -->
      <!-- end col -->
    </div>
  </div>


  @push('script') @endpush
</x-app-layout>
