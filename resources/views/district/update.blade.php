<x-app-layout :breadcrumb="$breadcrumb">
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Add District</h4>
            </div>
            <div class="card-body">
                <form action="{{route('district.update', $district->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">District Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{old('name', $district->name)}}">
                            </div>
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" id="code" name="code" class="form-control" value="{{old('code', $district->code)}}">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nosvillage" class="form-label">Nos Village</label>
                                    <input type="text" id="nosvillage" name="nos_village" class="form-control" value="{{old('nos_village', $district->nos_village)}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="nosberneficiaries" class="form-label">Nos Beneficiaries</label>
                                    <input type="text" id="nosberneficiaries" name="nos_beneficiaries" class="form-control" value="{{old('nos_beneficiaries', $district->nos_beneficiaries)}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="sanctioned" class="form-label">Sanctioned</label>
                                    <input type="text" id="sanctioned" name="sanctioned" class="form-control" value="{{old('sanctioned', $district->sanctioned)}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="released" class="form-label">Released</label>
                                    <input type="text" id="released" name="released" class="form-control" value="{{old('released', $district->released)}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="utilised" class="form-label">Utilized</label>
                                    <input type="text" id="utilised" name="utilised" class="form-control" value="{{old('utilised', $district->utilised)}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3"></div>
                        <div class="col-xl-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</x-app-layout>