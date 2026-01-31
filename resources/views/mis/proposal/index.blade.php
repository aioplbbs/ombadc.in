<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Proposal List</h4>
                <!-- @can('create department') -->
                <a href="{{route('mis.proposals.create')}}" class="btn btn-primary btn-sm" > Create Proposal </a>
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
                                <th>Proposal Name</th>
                                <th>Sector</th>
                                <th>Department</th>
                                <th>Entry Date</th>
                                <th>Initial Cost</th>
                                <!-- <th>Initial Cost</th> -->
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($proposals))
                            @foreach($proposals as $proposal)
                            <tr>
                                <td align="left">{{ $proposal->name }}</td>
                                <td align="left">{{ $proposal->sector->name }}</td>
                                <td align="left">{{ $proposal->department->name }}</td>
                                <td align="left">{{ $proposal->entry_date }}</td>
                                <td align="left">{{ $proposal->initial_cost . " " . $proposal->unit }}</td>
                                <td class="text-center text-muted">
                                    <a href="{{ route('mis.proposals.show', $proposal->id) }}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Show Proposal"> 
                                        <i class="ri-eye-line"></i>
                                    </a>

                                    <a href="{{ route('mis.proposals.edit', $proposal->id) }}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Proposal"> 
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    
                                    <a href="javascript:void(0)" onClick="deleteMessage('')" class="full-view fs-20 p-1 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Proposal">
                                        <i class="ri-delete-bin-line"></i>
                                    </a>            
                                    <form id="delete-form" method="post" action="{{ route('mis.proposals.destroy', $proposal->id) }}" style="display: none;">
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
</x-app-layout>