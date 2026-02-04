<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalProfileRequest;
use App\Models\PersonalProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PersonalProfileController extends Controller
{

    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view personal-profile')->only(['index']);
        $this->middleware('permission:create personal-profile')->only(['create', 'store']);
        $this->middleware('permission:update personal-profile')->only(['edit', 'update']);
        $this->middleware('permission:delete personal-profile')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Personal Profile",
            'items' => ["Home"],
            'last_item' => "Personal Profile"
        ];
        $personal_profiles = PersonalProfile::orderBy('order')->get();
        return view('personal-profile.index', compact('personal_profiles', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add Personal Profile",
            'items' => ["Home", "Personal Profile"],
            'last_item' => "Add Personal Profile"
        ];
        return view('personal-profile.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonalProfileRequest $request)
    {
        $data = $request->all();
        $order = PersonalProfile::max('order');
        $data['order'] = $order+1;
        $personal_profile = PersonalProfile::create($data);
        if($request->hasFile('profile_image')){
            $file = $request->file('profile_image');
            $personal_profile->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('personal_profile');
        }
        return redirect()->route('personal-profile.index')->with('success','Personal profile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalProfile $personalProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalProfile $personalProfile)
    {
        $breadcrumb = [
            'title' => "Edit Personal Profile",
            'items' => ["Home", "Personal Profile"],
            'last_item' => "Edit Personal Profile"
        ];
        return view('personal-profile.update', compact('personalProfile', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonalProfileRequest $request, PersonalProfile $personalProfile)
    {
        $data=$request->all();
        $media = $personalProfile->getFirstMedia('personal_profile');
        if($request->hasFile('profile_image')){
            if($media){
                $media->delete();
            }
            $file = $request->file('profile_image');
            $personalProfile->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('personal_profile');
        }
        $personalProfile->update($data);
        return redirect()->route('personal-profile.index')->with('success','Personal profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalProfile $personalProfile)
    {
        $personalProfile->delete();
        $personalProfile->clearMediaCollection('personal_profile');
        return redirect()->route('personal-profile.index')->with('success','Personal profile deleted successfully.');
    }

    public function updatePosition(Request $request)
    {
        $data = json_decode($request->menu_data??[]);
        foreach ($data as $index => $item) {
            PersonalProfile::where('id', $item->id)->update([
                'order' => $index + 1 // position starts from 1
            ]);
        }
        return $data;
    }
}
