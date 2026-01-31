<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Departments List</h4>
                <!-- @can('create department') -->
                <a href="{{route('mis.departments.create')}}" class="btn btn-primary btn-sm" > Add Departments </a>
                <!-- @endcan -->
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Sector Name</th>
                                <th>Sanctioned</th>
                                <th>Released</th>
                                <th>Utilised</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($departments))
                            @php
                                $i=1;
                            @endphp
                            @foreach($departments as $department)
                            <tr>
                                <td align="left">{{ $i++ }}</td>
                                <td align="left">{{ $department->name }}</td>
                                <td align="left">{{ $department->sector->name }}</td>
                                <td align="left">{{ $department->sanctioned }}</td>
                                <td align="left">{{ $department->released }}</td>
                                <td align="left">{{ $department->utilised }}</td>
                                <td class="text-center text-muted">
                                    @if($department->status == 0)
                                        <a href="javascript:void(0)" onClick="activeMessage('{{ route('mis.departments.activate', $department->id) }}')" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Activate department"> 
                                            <i class="ri-check-line"></i>
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" onClick="activeMessage('{{ route('mis.departments.deactivate', $department->id) }}')" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deactivate department"> 
                                            <i class="ri-prohibited-2-line"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('mis.departments.edit', $department->id) }}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit department"> 
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    
                                    <a href="javascript:void(0)" onClick="deleteMessage('')" class="full-view fs-20 p-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete department">
                                        <i class="ri-delete-bin-line"></i>
                                    </a>            
                                    <form id="delete-form" method="post" action="{{ route('mis.departments.destroy', $department->id) }}" style="display: none;">
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