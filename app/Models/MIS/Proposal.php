<?php

namespace App\Models\MIS;

use App\Models\Department;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Proposal extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $table = 'mis_proposals';

    protected $guarded = ['id'];

    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    public function currentStep(){
        return $this->belongsTo(ApprovalStep::class, 'current_step_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sector(){
        return $this->belongsTo(Page::class, 'sector_id');
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('proposal_copy');
    }
}
