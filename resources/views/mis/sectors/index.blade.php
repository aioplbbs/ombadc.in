<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Sector List</h4>
                <!-- @can('create department') -->
                <a href="{{route('mis.sectors.create')}}" class="btn btn-primary btn-sm" > Add Sector </a>
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
                            @if(!empty($sectors))
                            @php
                                $i=1;
                            @endphp
                            @foreach($sectors as $sector)
                            <tr>
                                <td align="left">{{ $i++ }}</td>
                                <td align="left">{{ $sector->name }}</td>
                                <td class="text-center text-muted">
                                    @if($sector->status == 0)
                                        <a href="javascript:void(0)" onClick="activeMessage('{{ route('mis.sectors.activate', $sector->id) }}')" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Activate sector"> 
                                            <i class="ri-check-line"></i>
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" onClick="activeMessage('{{ route('mis.sectors.deactivate', $sector->id) }}')" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deactivate sector"> 
                                            <i class="ri-prohibited-2-line"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('mis.sectors.edit', $sector->id) }}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit sector"> 
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    
                                    <a href="javascript:void(0)" onClick="deleteMessage('')" class="full-view fs-20 p-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete sector">
                                        <i class="ri-delete-bin-line"></i>
                                    </a>            
                                    <form id="delete-form" method="post" action="{{ route('mis.sectors.destroy', $sector->id) }}" style="display: none;">
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