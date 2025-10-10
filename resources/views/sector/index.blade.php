<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Sector List</h4>
                @can('create sector')
                <a href="{{route('sector.create')}}" class="btn btn-primary btn-sm" > Add Sector </a>
                @endcan
            </div>
            <div class="card-body">
                
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Page Name</th>
                                <th>Page Slug</th>
                                <th>Page Type</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($pages))
                            @foreach($pages as $key => $value)
                            <tr>
                                <td>{{$value->name}}</td>
                                <td>{{$value->slug}}</td>
                                <td>{{$value->page_type}}</td>
                                <td><span class="badge {{$value->status=='Show'?'bg-success':'bg-warning'}}">{{$value->status}}</span></td>
                                <td class="text-center text-muted">
                                    @can('update sector')
                                    <a href="{{route('sector.edit', $value->id)}}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Sector"> <i class="ri-edit-line"></i></a>
                                    @endcan
                                    @can('delete sector')
                                    <a href="javascript:;" class=" fs-20 p-1" onclick="deleteFunction(`{{route('sector.destroy', $value->id)}}`)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"> <i class="text-danger ri-delete-bin-line"></i></a>
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