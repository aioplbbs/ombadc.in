<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Users List</h4>
                <!-- @can('create department') -->
                <a href="{{route('mis.users.create')}}" class="btn btn-primary btn-sm" > Add User </a>
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
                                <th>User Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($users))
                            @foreach($users as $user)
                            <tr>
                                <td align="left">{{ $user->name }}</td>
                                <td align="left">{{ $user->mobile }}</td>
                                <td align="left">{{ $user->email }}</td>
                                <td align="left">{{ $user->getRoleNames()[0] }}</td>
                                <td class="text-center text-muted">
                                    @if($user->status == 0)
                                        <a href="javascript:void(0)" onClick="activeMessage('{{ route('mis.users.activate', $user->id) }}')" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Activate User"> 
                                            <i class="ri-check-line"></i>
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" onClick="activeMessage('{{ route('mis.users.deactivate', $user->id) }}')" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deactivate user"> 
                                            <i class="ri-prohibited-2-line"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('mis.users.edit', $user->id) }}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit User"> 
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    
                                    <a href="javascript:void(0)" onClick="deleteMessage('')" class="full-view fs-20 p-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete user">
                                        <i class="ri-delete-bin-line"></i>
                                    </a>            
                                    <form id="delete-form" method="post" action="{{ route('mis.users.destroy', $user->id) }}" style="display: none;">
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