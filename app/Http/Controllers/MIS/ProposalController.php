<?php

namespace App\Http\Controllers\MIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MIS\ProposalRequest;
use App\Models\Department;
use App\Models\MIS\Approval;
use App\Models\MIS\ApprovalWorkflow;
use App\Models\MIS\Proposal;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Proposals",
            'items' => ["Home"],
            'last_item' => "Proposals"
        ];
        $user = auth()->user();

        // User roles (Spatie)
        $roleIds = $user->roles->pluck('id');

        // dd($roleIds);

        $proposals = Proposal::query()
            ->whereHas('currentStep', function ($q) use ($roleIds) {
                $q->whereIn('role_id', $roleIds);
            })
            ->orWhere('user_id', $user->id)
            ->with(['currentStep.role', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mis.proposal.index', compact('proposals', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $breadcrumb = [
            'title' => "Add Proposal",
            'items' => ["Home", "Proposals"],
            'last_item' => "Add Proposal"
        ];
        $sectors = Page::where('page_type', 'Sector')->get();

        if($request->ajax()){
            $departments = Department::where('page_id', $request->sector_id)->get();
            $view = '';

            foreach($departments as $department){
                $html = '<option value="' . $department->id . '">' . $department->name . '</option>';
                $view .= $html;
            }

            return $view;
        }

        return view('mis.proposal.create', compact('breadcrumb', 'sectors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProposalRequest $request)
    {
        $data = $request->only(['name', 'entry_date', 'department_id', 'sector_id', 'initial_cost', 'unit']);
        $data['status'] = 'pending';
        $data['user_id'] = Auth::id();

        $proposal_workflow = ApprovalWorkflow::where('name', 'Proposal Workflows 23')->first();
        $first_step = $proposal_workflow->steps()->orderBy('step_order')->firstOrFail();
        $data['current_step_id'] = $first_step->id;

        $proposal = Proposal::create($data);

        if($request->hasFile("proposal_copy")){
            $file = $request->file("proposal_copy");
            $proposal->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('proposal_copy');
        }

        Approval::create([
            'approvable_type' => Proposal::class,
            'approvable_id' => $proposal->id,
            'step_id' => $first_step->id,
            'status' => 'pending',
        ]);

        return redirect()->route('mis.proposals.index')->with('success', 'Proposal submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
