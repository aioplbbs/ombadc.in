<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Article List</h4>
                @can('create article')
                <a href="{{route('article.create')}}" class="btn btn-primary btn-sm" > Add Article </a>
                @endcan
            </div>
            <div class="card-body">
                
                <div class="table-responsive-sm">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($document))
                            @foreach($document as $key => $value)
                            <tr>
                                @php
                                $imageurl=$value->getFirstMediaUrl('thumbnails');
                                @endphp
                                <td><img src="{{$imageurl}}" width="50"></td>
                                <td>{{$value->name??''}}</td>
                                @php
                                $data = json_decode($value->data, true);
                                @endphp
                                <td>{{$data['url'] ?? ''}}</td>
                                <td class="text-center text-muted">
                                    @can('update article')
                                    <a href="{{route('article.edit', $value->id)}}" class="full-view fs-20 p-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit District"> <i class="ri-edit-line"></i></a>
                                    @endcan
                                    @can('delete article')
                                    <a href="javascript:;" class=" fs-20 p-1" onclick="deleteFunction(`{{route('article.destroy', $value->id)}}`)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"> <i class="text-danger ri-delete-bin-line"></i></a>
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