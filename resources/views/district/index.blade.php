<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">District List</h4>
                @can('create district')
                <a href="{{route('district.create')}}" class="btn btn-primary btn-sm" > Add District </a>
                @endcan
            </div>
            <div class="card-body">
                
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>District Name</th>
                                <th>Code</th>
                                <th>Sanctioned</th>
                                <th>Released</th>
                                <th>Utilised</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($districts))
                            @foreach($districts as $key => $value)
                            <tr>
                                <td>{{$value->name??''}}</td>
                                <td>{{$value->code}}</td>
                                <td>{{$value->sanctioned}}</td>
                                <td>{{$value->released}}</td>
                                <td>{{$value->utilised}}</td>
                                <td class="text-center text-muted">
                                    @can('update district')
                                    <a href="{{route('district.edit', $value->id)}}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit District"> <i class="ri-edit-line"></i></a>
                                    @endcan
                                    @can('delete district')
                                    <a href="javascript:;" class=" fs-20 p-1" onclick="deleteFunction(`{{route('district.destroy', $value->id)}}`)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"> <i class="text-danger ri-delete-bin-line"></i></a>
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