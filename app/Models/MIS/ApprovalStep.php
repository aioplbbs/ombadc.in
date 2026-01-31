<?php

namespace App\Models\MIS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role;

class ApprovalStep extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'workflow_id',
        // 'from_role_id',
        // 'to_role_id'
        'role_id', 
        'step_order'
    ];

    public function workflow()
    {
        return $this->belongsTo(ApprovalWorkflow::class, 'workflow_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class, 'step_id');
    }
}
