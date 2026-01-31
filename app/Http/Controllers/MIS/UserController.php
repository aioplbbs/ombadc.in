<?php

namespace App\Http\Controllers\MIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MIS\UserRequest;
use App\Models\Department;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumb = [
            'title' => "Department List",
            'items' => ["Home"],
            'last_item' => "Department"
        ];
        $sectors = Page::where('page_type', 'Sector')->get();
        $roles = Role::where('name', '<>', 'Super Admin')->get();
        
        $users = User::with('departments')->whereDoesntHave('roles', function ($q) {
            $q->where('name', 'Super Admin');
        })->when($request->filled('department_id'), function($query) use($request){
            $query->whereHas('departments', function($q) use($request) {
                $q->where('departments.id', $request->department_id);
            });
        })->when($request->filled('role_id'), function ($query) use ($request) {
            $query->whereHas('roles', function ($q) use ($request) {
                $q->where('roles.id', $request->role_id);
            });
        })->when($request->filled('search_text'), function($query) use($request){
            $query->where('name', 'LIKE', "%$request->search_text%");
        })->get();

        if($request->ajax()){
            $departments = Department::where('page_id', $request->sector_id)->get();
            $view = '';

            foreach($departments as $department){
                $html = '<option value="' . $department->id . '">' . $department->name . '</option>';
                $view .= $html;
            }

            return $view;
        }

        return view('mis.users.index', compact('sectors', 'roles', 'users', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('name', '<>', 'Super Admin')->get();
        $sectors = Page::with('departments')->where('page_type', 'Sector')->get();

        // dd($roles);

        return view('mis.users.create', compact('sectors', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->username,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1
        ]);

        $user->roles()->attach($request->role_id);
        $user->departments()->attach($request->department_id);

        return redirect()->back()->with('success', 'User Created successfully.');

        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user->load('departments');
        $roles = Role::where('name', '<>', 'Super Admin')->get();
        $sectors = Page::with('departments')->where('page_type', 'Sector')->get();

        // dd($roles);

        return view('mis.users.edit', compact('sectors', 'roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function activate(User $user){
        $user->update(['status'=>1]);
        return redirect()->back()->with('success', 'User activated successfully');
    }

    public function deactivate(User $user){
        $user->update(['status'=>0]);
        return redirect()->back()->with('success', 'User deactivated successfully');
    }
}
