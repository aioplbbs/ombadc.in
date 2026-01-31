<?php

namespace App\Models\MIS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApprovalWorkflow extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function steps()
    {
        return $this->hasMany(ApprovalStep::class, 'workflow_id');
    }
}
