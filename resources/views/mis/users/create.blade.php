<x-app-layout>
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Add User</h4>
                <!-- @can('create department') -->
                <a href="{{route('mis.users.index')}}" class="btn btn-primary btn-sm" > Back </a>
                <!-- @endcan -->
            </div>
            <div class="card-body">
                <form  onsubmit="return validateUser(this);" name="frm" action="{{ route('mis.users.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Username">Username</label>
                            <input type="text" class="form-control" id="Username" name="username" value="{{ old('username') }}" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="RoleID">Select Role</label>
                            <select class="form-select" id="RoleID" name="role_id">
                                <option value="">Select role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Mobile">Mobile</label>
                            <input type="text" class="form-control" id="Mobile" name="mobile" value="{{ old('mobile') }}" maxlength="10" onKeyPress="return integersonly(event);" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" id="Email" name="email" value="{{ old('email') }}" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Password">Password</label>
                            <input type="text" class="form-control" id="Password" name="password" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ConfirmPassword">Confirm Password</label>
                            <input type="text" class="form-control" id="ConfirmPassword" name="password_confirmation" />
                        </div>
                    </div>
                    
                    <table class="table table-bordered table-striped" width="100%" border="0" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th align="left" colspan="4" style="background:#2c3e50; color:#FFF;">User Department Mapping</th>
                            </tr>    
                            <tr>
                                <th align="left"></th>
                                <th align="left" width="150">Department Code</th>
                                <th align="left">Department Name</th>
                                <th align="left">Sector Name</th>
                            </tr>             
                        </thead>
                        <tbody>
                            @foreach($sectors as $sector)
                                @foreach($sector->departments as $department)
                                    <tr>
                                        <td align="left"><input type="checkbox" name="department_id[]" value="{{ $department->id }}" /></td>
                                        <td align="left">{{ $department->short_name }}</td>
                                        <td align="left">{{ $department->name }}</td>
                                        <td align="left">{{ $sector->name }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                    <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
    </div>

    @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                $('#sector_id').change(function(){
                    console.log($(this).val())
                    $.ajax({
                        url : "{{ route('mis.proposals.create') }}",
                        method : "GET",
                        data: {
                            sector_id: $(this).val()
                        },
                        success : function (data) {
                            if(data!="") {
                                $("#DepartmentID").html(data);
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
