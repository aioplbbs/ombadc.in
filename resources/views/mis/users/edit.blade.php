<x-mis-layout>
    <div class="page-content">       
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-list-alt"></i> Edit User 
                            <a href="{{ route('users.index') }}">
                                <button type="button" class="btn btn-default btn-xs">Back</button>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($errors->any())
                <div class="err">
                    @foreach($errors->all() as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            @endif
            @if (session()->exists('success'))
                <div class="succ">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-lg-12">
                <div class="portlet portlet-basic">
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <div id="validationExamples" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <form  onsubmit="return validateUser(this);" name="frm" action="{{ route('users.update', $user->id) }}" method="post">
                                        @csrf
							            <table id="tblSamplef" border="0" cellpadding="4" cellspacing="1" style="width:100%;">
                                            <tr>  
                                                <td align="left" width="150">User Name</td>
                                                <td align="left"><input type="text" class="form-control" id="Username" name="username" value="{{ $user->name }}" /></td>
                                                <td align="left" width="150">Select Role</td>
                                                <td align="left" width="350">
                                                    <select class="form-control" id="RoleID" name="role_id">
									                    <option value=""></option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}" {{ $user->getRoleNames()[0] == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                                        @endforeach
									                </select>
                                                </td>
                                            </tr>
                                            <tr>  
                                                <td>Mobile</td>
                                                <td align="left">
                                                    <input type="text" class="form-control" id="Mobile" name="mobile" value="{{ $user->mobile }}" maxlength="10" onKeyPress="return integersonly(event);" />
                                                </td>
                                                <td>Email</td>
                                                <td align="left">
                                                    <input type="text" class="form-control" id="Email" name="email" value="{{ $user->email }}" />
                                                </td>
                                            </tr>
                                            <tr>  
                                                <td>Password</td>
                                                <td align="left">
                                                    <input type="text" class="form-control" id="Password" name="password" />
                                                </td>
                                                <td>Confirm Password</td>
                                                <td align="left">
                                                    <input type="text" class="form-control" id="ConfirmPassword" name="password_confirmation" />
                                                </td>
                                            </tr>
                                            <tr>  
                                                <td colspan="4">
									                <table class="table table-bordered table-striped" width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th align="left" colspan="4" style="background:#2c3e50; color:#FFF;">User Department Mapping</th>
                                                            </tr>    
                                                            <tr>
                                                                <th align="left"><input type="checkbox" name="dept" value="0" /></th>
                                                                <th align="left" width="150">Department Code</th>
                                                                <th align="left">Department Name</th>
                                                                <th align="left">Sector Name</th>
                                                            </tr>             
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $department_ids = $user->departments->pluck('id')->toArray();
                                                            @endphp
                                                            @foreach($sectors as $sector)
                                                                @foreach($sector->departments as $department)
                                                                    <tr>
                                                                        <td align="left">
                                                                            <input type="checkbox" name="department_id[]" value="{{ $department->id }}" {{ in_array($department->id, $department_ids) ? 'checked' : '' }} />
                                                                        </td>
                                                                        <td align="left">{{ $department->short_name }}</td>
                                                                        <td align="left">{{ $department->name }}</td>
                                                                        <td align="left">{{ $sector->name }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endforeach
                                                        </tbody>
                                                    </table>
									            </td>
                                            </tr>								
							            </table>
                                        <div class="form-group">
                                            <div class="col-sm-12" style="text-align:center;">
                                                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-default" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>                     
             	        </div>
         	        </div>
     	        </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                $('#sector_id').change(function(){
                    console.log($(this).val())
                    $.ajax({
                        url : "{{ route('proposals.create') }}",
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
</x-mis-layout>
