<x-app-layout>
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Menus List</h4>
                @can('create menus')
                <button type="button" class="btn btn-primary btn-sm save" data-bs-toggle="modal" data-bs-target="#standard-modal"> Add Menu Container </button>
                @endcan
            </div>
            <div class="card-body">
                
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Menu Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($menus))
                            @foreach($menus as $key => $value)
                            <tr>
                                <td>{{$value->data['name']??""}}</td>
                                <td class="text-center text-muted">
                                    <a href="{{route('menu.index', [$value->id])}}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Menu"> <i class="text-primary ri-menu-line"></i></a>
                                    @can('update menus')
                                    <a href="javascript:;" class="editPermission fs-20 p-1" data-bs-toggle="modal" data-bs-target="#update-modal" data-name="{{$value->data['name']??''}}" data-id="{{$value->id}}"> <i class="text-primary ri-edit-line"></i></a>
                                    @endcan
                                    @can('delete menus')
                                    <a href="javascript:;" class=" fs-20 p-1" onclick="deleteFunction(`{{route('menus.destroy', $value->id)}}`)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"> <i class="text-danger ri-delete-bin-line"></i></a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                            @endif
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
                    <h4 class="modal-title" id="standard-modalLabel">Add Menu Container</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{route('menus.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
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
                    <h4 class="modal-title" id="update-modalLabel">Edit Permission</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="#" method="post" id="updateForm">
                    @method("PUT")
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
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
            $("#updateForm").attr("action", "{{route('menus.index')}}"+"/"+id);
            $("#updateForm input[name='name']").val(name);
        });
    </script>
    @endpush
</x-app-layout>