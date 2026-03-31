<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Http\Requests\NoticeRequest;
use Str;

class NoticeController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view notice')->only(['index']);
        $this->middleware('permission:create notice')->only(['create', 'store']);
        $this->middleware('permission:update notice')->only(['edit', 'update']);
        $this->middleware('permission:delete notice')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $breadcrumb = [
            'title' => "Update Notice",
            'items' => ["Home"],
            'last_item' => "Notice"
        ];


        $notice = Notice::orderBy('id', 'desc')->paginate(20);
        return view('notice.index', compact('notice', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Update Notice",
            'items' => ["Home"],
            'last_item' => "Notice"
        ];


        return view('notice.create' , compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoticeRequest $request)
    {
        $data = $request->all();
        $data['custom_data'] = [];
        if($data['notice_type'] == "Link"){
            $data['custom_data']['web_link'] = $data['web_link'];
        }
        if(in_array('Tender', $request->input('notice_category', []))){
            $data['custom_data']['expiry_date'] = $request->input('tender_expiry_date');
        }
        $notice = New Notice($data);
        $notice->save();
        if($request->notice_type == "Upload File" && $request->hasFile('notice')){
            $file = $request->file('notice');
            $notice->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('notice');
        }
        if(in_array('Tender', $request->input('notice_category', [])) && $request->hasFile('tender_image')){
            $file = $request->file('tender_image');
            $notice->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('tender_image');
        }
    
        return redirect()->route('notice.index')->with('success', "Notice Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        $breadcrumb = [
            'title' => "Update Notice",
            'items' => ["Home"],
            'last_item' => "Notice"
        ];

        return view('notice.update', compact('notice', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoticeRequest $request, Notice $notice)
    {
        $data = $request->all();
        $data['custom_data'] = $notice->custom_data ?? [];
        if($data['notice_type'] == "Link"){
            $data['custom_data']['web_link'] = $data['web_link'];
        }else{
            unset($data['custom_data']['web_link']);
        }
        if(in_array('Tender', $request->input('notice_category', []))){
            $data['custom_data']['expiry_date'] = $request->input('tender_expiry_date');
        }else{
            unset($data['custom_data']['expiry_date']);
            $notice->clearMediaCollection('tender_image');
        }
        if($request->notice_type == "Upload File" && $request->hasFile('notice')){
            $file = $request->file('notice');
            $notice->clearMediaCollection('notice');
            $notice->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('notice');
        }
        if(in_array('Tender', $request->input('notice_category', [])) && $request->hasFile('tender_image')){
            $file = $request->file('tender_image');
            $notice->clearMediaCollection('tender_image');
            $notice->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('tender_image');
        }
        $notice->update($data);

        return redirect()->route('notice.index')->with('success', "Notice Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->back()->with('success', 'Notice Deleted Successfully');
    }
}
