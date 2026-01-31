<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Workflow Steps List</h4>
                
                <a href="{{route('mis.steps.create', ['workflow' => $workflow->id])}}" class="btn btn-primary btn-sm" > Add Workflow Step </a>
                
            </div>
            <div class="card-body">
                
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th>Workflow</th>
                                <th>Role</th>
                                <th>Step Order</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @if(!empty($workflow->steps))
                            @foreach($workflow->steps as $key => $value)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$workflow->name}}</td>
                                <td>{{$value->role->name}}</td>
                                <td>{{$value->step_order}}</td>
                                <td class="text-center text-muted">
                                    <a href="{{route('mis.steps.edit', ['workflow'=>$workflow->id, 'step'=>$value->id])}}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Page"> <i class="ri-edit-line"></i></a>
                                    <a href="javascript:;" class=" fs-20 p-1" onclick="deleteFunction(`{{route('page.destroy', $value->id)}}`)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"> <i class="text-danger ri-delete-bin-line"></i></a>
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