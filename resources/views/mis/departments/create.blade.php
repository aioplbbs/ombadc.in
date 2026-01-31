<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Add Department</h4>
                <!-- @can('create department') -->
                <a href="{{route('mis.departments.index')}}" class="btn btn-primary btn-sm" > Back </a>
                <!-- @endcan -->
            </div>
            <div class="card-body">
                <form action="{{ route('mis.departments.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Department Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="sector_id">
                                Select Sector
                            </label>
                            <select class="form-select" id="sector_id" name="sector_id">
                                <option value=""></option>
                                @foreach($sectors as $sector)
                                    <option value="{{ $sector->id }}"
                                        {{ $sector->id == old('sector_id') ? 'selected' : '' }}>
                                        {{ $sector->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="sanctioned">Sanctioned</label>
                            <input type="text" class="form-control" id="sanctioned" name="sanctioned" value="{{ old('sanctioned') }}" />
                        </div>
                        <div class="col-md-4">
                            <label for="released">Released</label>
                            <input type="text" class="form-control" id="released" name="released" value="{{ old('released') }}" />
                        </div>
                        <div class="col-md-4">
                            <label for="utilised">Utilised</label>
                            <input type="text" class="form-control" id="utilised" name="utilised" value="{{ old('utilised') }}" />
                        </div>
                    </div>
                    <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
    </div>

</x-app-layout>
