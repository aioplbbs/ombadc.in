<?php

namespace App\Models\MIS;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Approval extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'step_id',
        'status',
        'action_by',
        'action_at',
        'remarks', 
        'approvable_id', 
        'approvable_type'
    ];

    protected $casts = [
        'action_at' => 'datetime'
    ];

    public function approvable()
    {
        return $this->morphTo();
    }

    public function step()
    {
        return $this->belongsTo(ApprovalStep::class);
    }

    public function actionBy()
    {
        return $this->belongsTo(User::class, 'action_by');
    }
}
