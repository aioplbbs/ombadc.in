<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Add PIA</h4>
                <!-- @can('create department') -->
                <a href="{{route('mis.pias.index')}}" class="btn btn-primary btn-sm" > Back </a>
                <!-- @endcan -->
            </div>
            <div class="card-body">
                <form action="{{ route('mis.pias.store') }}" method="post">
                    @csrf
                    <div class="col-md-6 mb-3">
                        <label for="name">PIA Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label for="sector_id">
                            Select Sector <span class="text-danger">*</span>
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
                    <div class="col-md-6 mb-3">
                        <label for="effective_date">Effective Date</label>
                        <input type="text" id="effective_date" name="effective_date" class="form-control flatpickr-input" data-provider="flatpickr" data-date-format="Y-m-d" readonly="readonly" value="{{old('effective_date')}}">
                    </div>
                    <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
    </div>

</x-app-layout>
