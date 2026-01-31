<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Workflow List</h4>
                <button type="button" class="btn btn-primary btn-sm save" data-bs-toggle="modal" data-bs-target="#standard-modal"> Add Workflow </button>
            </div>
            <div class="card-body">
                
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th> Workflow Name </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($workflow as $key => $value)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$value['name']}}</td>
                                <td class="text-center text-muted">
                                    <a href="{{route('mis.steps.index', ['workflow' => $value->id])}}" class="fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add Workflow Steps"><i class="text-primary ri-add-line"></i></a>
                                    <a href="javascript:;" class="editPermission fs-20 p-1" data-bs-toggle="modal" data-bs-target="#update-modal" data-name="{{$value->name}}" data-guard="{{$value->guard_name}}" data-id="{{$value->id}}"> <i class="text-primary ri-edit-line"></i></a>
                                    <a href="javascript:;" class=" fs-20 p-1" onclick="deleteFunction(`{{route('mis.workflow.destroy', $value->id)}}`)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"> <i class="text-danger ri-delete-bin-line"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>

    <!-- Standard modal content -->
    <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Add Workflow</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{route('mis.workflow.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Workflow Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Workflow Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Standard modal content -->
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="update-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="update-modalLabel">Edit Workflow</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="#" method="post" id="updateForm">
                    @method("patch")
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Workflow Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Workflow Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @push('script')
    <script>
        $(document).on("click", ".editPermission", function () {
            let id = $(this).data("id");
            let name = $(this).data("name");
            $("#updateForm").attr("action", "{{route('mis.workflow.index')}}"+"/"+id);
            $("#updateForm input[name='name']").val(name);
        });
    </script>
    @endpush
</x-app-layout>