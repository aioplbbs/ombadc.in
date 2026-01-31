<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Roles List</h4>
                <!-- @can('create department') -->
                <a href="{{route('mis.roles.create')}}" class="btn btn-primary btn-sm" > Add Role </a>
                <!-- @endcan -->
            </div>
            @if (session()->exists('success'))
                <div class="succ">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($roles))
                            @php
                                $i=1;
                            @endphp
                            @foreach($roles as $role)
                            <tr>
                                <td align="left">{{ $i++ }}</td>
                                <td align="left">{{ $role->name }}</td>
                                <td class="text-center text-muted">
                                    @if($role->status == 0)
                                        <a href="javascript:void(0)" onClick="activeMessage('{{ route('mis.roles.activate', $role->id) }}')" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Activate role"> 
                                            <i class="ri-check-line"></i>
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" onClick="activeMessage('{{ route('mis.roles.deactivate', $role->id) }}')" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deactivate role"> 
                                            <i class="ri-prohibited-2-line"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('mis.roles.edit', $role->id) }}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit role"> 
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    
                                    <a href="javascript:void(0)" onClick="deleteMessage('')" class="full-view fs-20 p-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete role">
                                        <i class="ri-delete-bin-line"></i>
                                    </a>            
                                    <form id="delete-form" method="post" action="{{ route('mis.roles.destroy', $role->id) }}" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
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

    @push('script')
        <script>
            function deleteMessage(u_id){
                if(confirm("Are you sure to delete this?")){
                    document.getElementById('delete-form').submit();
                }
            }

            function activeMessage(url){
                if(confirm("Are you sure to active this?")){
                    document.location.href=url;
                }
            }
        </script>
    @endpush
</x-app-layout>