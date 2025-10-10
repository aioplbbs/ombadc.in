<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Gallery List</h4>
                @can('create gallery')
                <a href="{{route('gallery.create')}}" class="btn btn-primary btn-sm" > Add Gallery </a>
                @endcan
            </div>
            <div class="card-body">
                <div class="row">
                @foreach($gallery as $value)
                    <div class="col-sm-3 col-lg-2">
                        <!-- Simple card -->
                        <div class="card d-block">
                            @php
                                $imageUrl = $value->getFirstMediaUrl('gallery') ?: asset('assets/images/small/small-1.jpg');
                            @endphp

                            <img class="card-img-top" src="{{ $imageUrl }}" alt="{{ $value->caption }}">

                            <div class="card-body">
                                <h5 class="card-title">{{ $value->caption }}</h5>

                                <div class="d-flex justify-content-center">
                                    @can('update gallery')
                                        <a href="{{ route('gallery.edit', $value->id) }}" class="me-2 fs-20 p-1"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Gallery">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                    @endcan

                                    @can('delete gallery')
                                        <a href="javascript:;" class="fs-20 p-1 text-danger"
                                        onclick="deleteFunction(`{{ route('gallery.destroy', $value->id) }}`)"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    @endcan
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                @endforeach
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</x-app-layout>