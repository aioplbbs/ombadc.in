<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Add Role</h4>
                <!-- @can('create department') -->
                <a href="{{route('mis.roles.index')}}" class="btn btn-primary btn-sm" > Back </a>
                <!-- @endcan -->
            </div>
            <div class="card-body">
                <form action="{{ route('mis.roles.update', $role->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Role Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" />
                        </div>
                    </div>
                    <h4 class="mb-3">Function List</h4>
                    @foreach($crudMatrix as $key=>$actions)
                        <h5 class="mb-3">{{ ucfirst($key) }}</h5>
                        <table class="table table-bordered table-striped" width="100%" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th align="left">SN</th>
                                    <th align="left" width="1000">Name</th>
                                    <th class="text-center">Add</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">View</th>
                                    <th class="text-center">Delete</th>
                                </tr>             
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                
                                @foreach($actions as $key1 => $permission)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $key1 != 'main' ? ucfirst($key1) : $key }}</td>
                                        @foreach(['add','edit','view','delete'] as $action)
                                            <td class="text-center">
                                                @if(isset($permission[$action]))
                                                    <input type="checkbox"
                                                        name="permissions[]"
                                                        value="{{ $permission[$action] }}" 
                                                        {{ in_array($permission[$action], $rolePermissions) ? 'checked' : '' }}>
                                                @else
                                                    —
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach

                                @if(isset($actionPermissions[$key]))
                                    @foreach($actionPermissions[$key] as $permission)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ str_replace(['mis.', '-', '.'], ['',' ', ' '], $permission) }}</td>
                                            <td class="text-center">
                                                <input type="checkbox"
                                                    name="permissions[]"
                                                    value="{{ $permission }}" {{ in_array($permission, $rolePermissions) ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    @endforeach

                    @foreach(['fund', 'report'] as $value)
                        <h5 class="mb-3">{{ ucfirst($value) }}</h5>
                        <table class="table table-bordered table-striped" width="100%" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th align="left">SN</th>
                                    <th align="left" width="1000">Name</th>
                                    <th class="text-center">Add</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">View</th>
                                    <th class="text-center">Delete</th>
                                </tr>             
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp

                                @if(isset($actionPermissions[$value]))
                                    @foreach($actionPermissions[$value] as $permission)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ str_replace(['mis.', '-', '.'], ['',' ', ' '], $permission) }}</td>
                                            <td class="text-center">
                                                <input type="checkbox"
                                                    name="permissions[]"
                                                    value="{{ $permission }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    @endforeach

                    <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
    </div>

    @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                $('#sector_id').change(function(){
                    console.log($(this).val())
                    $.ajax({
                        url : "{{ route('mis.proposals.create') }}",
                        method : "GET",
                        data: {
                            sector_id: $(this).val()
                        },
                        success : function (data) {
                            if(data!="") {
                                $("#DepartmentID").html(data);
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
