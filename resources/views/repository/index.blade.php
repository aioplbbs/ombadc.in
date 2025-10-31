<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Document List</h4>
                @can('create repository')
                <a href="{{route('repository.create')}}" class="btn btn-primary btn-sm" > Add Repository </a>
                @endcan
            </div>
            <div class="card-body">
                
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Doc Date</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($document))
                            @foreach($document as $key => $value)
                            <tr>
                                @php
                                $data = json_decode($value->data, true);
                                @endphp
                                <td>{{$data['file_date'] ?? ''}}</td>
                                <td>{{$value->name??''}}</td>
                                <td>{{$data['description'] ?? ''}}</td>
                                <td class="text-center text-muted">
                                    @can('update repository')
                                    <a href="{{route('repository.edit', $value->id)}}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit District"> <i class="ri-edit-line"></i></a>
                                    @endcan
                                    @can('delete repository')
                                    <a href="javascript:;" class=" fs-20 p-1" onclick="deleteFunction(`{{route('repository.destroy', $value->id)}}`)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"> <i class="text-danger ri-delete-bin-line"></i></a>
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
</x-app-layout>