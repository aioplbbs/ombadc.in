<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Edit Sector</h4>
                <!-- @can('create department') -->
                <a href="{{route('mis.sectors.index')}}" class="btn btn-primary btn-sm" > Back </a>
                <!-- @endcan -->
            </div>
            <div class="card-body">
                <form action="{{ route('mis.sectors.update', $sector->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Sector Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $sector->name }}" />
                        </div>
                    </div>
                    <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
    </div>

    
</x-app-layout>
