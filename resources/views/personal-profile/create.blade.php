<x-app-layout>
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Add Personal Profile</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('personal-profile.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            {{-- Title --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                            </div>

                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" id="designation" name="designation" class="form-control"
                                    value="{{ old('designation') }}">
                            </div>

                            <div class="row mb-3">
                                {{-- Internal Page --}}
                                <div class="col-md-6">
                                    <label for="page" class="form-label">Staff Category</label>
                                    <select name="staff_category" id="page" class="form-control">
                                        <option value="0">Choose catgegory</option>
                                        @php
                                            $staff_category = config('constants.staff_category');
                                        @endphp
                                        @foreach ($staff_category as $key=>$value)
                                            <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- PDF Upload --}}
                                <div class="col-md-6">
                                    <label for="profile" class="form-label">Photo</label>
                                    <input type="file" id="profile" name="profile_image" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email') }}">
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" id="phone" name="phone_number" class="form-control"
                                    value="{{ old('phone_number') }}">
                            </div>

                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" id="date_of_birth" name="date_of_birth" class="form-control"
                                    value="{{ old('date_of_birth') }}">
                            </div>

                            <div class="mb-3">
                                <label for="qualification" class="form-label">Qualification</label>
                                <input type="text" id="qualification" name="qualification" class="form-control"
                                    value="{{ old('qualification') }}">
                            </div>

                            <div class="mb-3">
                                <label for="short_brief" class="form-label">Short Brief</label>
                                <textarea id="short_brief" name="short_brief" class="form-control"
                                    >{{ old('short_brief') }}</textarea>
                            </div>

                            {{-- External URL --}}
                            
                        </div>

                        <div class="col-xl-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</x-app-layout>