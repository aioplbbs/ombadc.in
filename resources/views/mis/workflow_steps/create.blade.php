<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Add Workflow Step</h4>
                <small> ({{$workflow->name}})</small>
            </div>
            <div class="card-body">
                <form action="{{ route('mis.steps.store', ['workflow' => $workflow->id]) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <h5 class="mb-3">Define Workflow Steps</h5>
                            <table class="table table-bordered" id="stepsTable">
                                <thead>
                                    <tr>
                                        <th width="15%">Step Order</th>
                                        <th>Role</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="number" name="steps[0][step_order]" class="form-control" value="1" min="1" required>
                                        </td>
                                        <td>
                                            <select name="steps[0][role_id]" class="form-control" required>
                                                <option value="">Choose Role</option>
                                                @foreach($roles as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger btn-sm remove-row">×</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-secondary btn-sm" id="addStep">
                                + Add Step
                            </button>
                        </div>
                        <div class="col-xl-12 mt-4">
                            <button type="submit" class="btn btn-primary">Save Workflow Steps</button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>

    @push('script')
    <script>
        function updateStepNumbers() {
            document.querySelectorAll('#stepsTable tbody tr').forEach((row, index) => {
                row.querySelector('input[name$="[step_order]"]').value = index + 1;

                row.querySelectorAll('input, select').forEach(el => {
                    el.name = el.name.replace(/\[\d+\]/, `[${index}]`);
                });
            });
        }

        document.getElementById('addStep').addEventListener('click', function () {
            const tableBody = document.querySelector('#stepsTable tbody');
            const index = tableBody.children.length;

            const row = `
                <tr>
                    <td>
                        <input type="number" name="steps[${index}][step_order]"
                            class="form-control" value="${index + 1}" min="1" required>
                    </td>
                    <td>
                        <select name="steps[${index}][role_id]" class="form-control" required>
                            <option value="">Choose Role</option>
                            @foreach($roles as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-sm remove-row">×</button>
                    </td>
                </tr>
            `;

            tableBody.insertAdjacentHTML('beforeend', row);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-row')) {
                e.target.closest('tr').remove();
                updateStepNumbers();
            }
        });
    </script>
    @endpush
</x-app-layout>