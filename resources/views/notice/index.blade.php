<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Notice List</h4>
                @can('create notice')
                <a href="{{route('notice.create')}}" class="btn btn-primary btn-sm" > Add Notice </a>
                @endcan
            </div>
            <div class="card-body">
                
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Publish Date</th>
                                <th>Name</th>
                                <th>Category</th>
                                <!-- <th>Type</th> -->
                                <!-- <th>Open In</th> -->
                                <th>New Blink</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($notice))
                            @foreach($notice as $key => $value)
                            <tr>
                                 <td>{{$value->notice_publish}}</td>
                                <td>{{$value->notice_name}}</td>
                                <td>{{implode(",", $value->notice_category)}}</td>
                                <!-- <td>{{$value->notice_type}}</td> -->
                                <!-- <td>{{$value->notice_open_in}}</td> -->
                                <td>{{$value->notice_blink}}</td>
                               
                                <td><span class="badge {{$value->status=='Show'?'bg-success':'bg-warning'}}">{{$value->status}}</span></td>
                                <td class="text-center text-muted">
                                    @can('update notice')
                                    <a href="{{route('notice.edit', $value->id)}}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Notice"> <i class="ri-edit-line"></i></a>
                                    @endcan
                                    @can('delete notice')
                                    <a href="javascript:;" class=" fs-20 p-1" onclick="deleteFunction(`{{route('notice.destroy', $value->id)}}`)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"> <i class="text-danger ri-delete-bin-line"></i></a>
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