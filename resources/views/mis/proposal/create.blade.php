<x-mis-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Create Proposal</h4>
                <a class="btn btn-primary" href="{{ route('mis.proposals.index') }}"> Back </a>
            </div>

            <div class="card-body">
                <form onsubmit="return validateProposal(this);"
                    action="{{ route('mis.proposals.store') }}"
                    method="post"
                    enctype="multipart/form-data"
                    class="form-horizontal"
                >
                    @csrf
                    <input type="hidden" name="act" value="add">
                    <div class="col-md-6 form-group mb-3">
                        <label for="sector_id">
                            Select Sector <span class="text-danger">*</span>
                        </label>
                        <select class="form-select" id="sector_id" name="sector_id">
                            <option value=""></option>
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->id }}"
                                    {{ $sector->id == old('sector_id') ? 'selected' : '' }}>
                                    {{ $sector->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="DepartmentID">
                            Select Department <span class="text-danger">*</span>
                        </label>
                        <select class="form-control" id="DepartmentID" name="department_id">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label for="Name">
                            Proposal Name <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                            class="form-control"
                            id="Name"
                            name="name"
                            value="{{ old('name') }}">
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="EntryDate">
                            Entry Date <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="EntryDate" name="entry_date" class="form-control flatpickr-input" data-provider="flatpickr" data-date-format="Y-m-d" readonly="readonly" value="{{old('entry_date')}}">
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label>
                            Initial Cost (Rs.) <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="Cost"
                                name="initial_cost"
                                value="{{ old('initial_cost') }}">
                            <span class="input-group-btn" style="width: 1%;"></span>
                            <select class="form-control" name="unit" style="max-width:120px;">
                                <option value="Crore" {{ old('unit') == 'Crore' ? 'selected' : '' }}>
                                    Crore
                                </option>
                                <option value="Lac" {{ old('unit') == 'Lac' ? 'selected' : '' }}>
                                    Lac
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Proposal Copy -->
                    <div class="col-md-6 form-group mb-3">
                        <label for="ProposalCopy">
                            Proposal Copy <span class="text-danger">*</span>
                        </label>
                        <input type="file" class="form-control" id="ProposalCopy" name="proposal_copy">
                        <!-- <small class="text-muted">
                            Multiple file selection allowed.
                        </small> -->
                    </div>

                    <!-- Buttons -->
                    <div class="col-md-6">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">
                            Save &amp; Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function () {
                $('#sector_id').on('change', function () {
                    $.ajax({
                        url: "{{ route('mis.proposals.create') }}",
                        method: "GET",
                        data: { sector_id: $(this).val() },
                        success: function (data) {
                            if (data) {
                                $('#DepartmentID').html(data);
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
</x-mis-layout>
