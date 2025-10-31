<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Casts\CleanHtmlInput;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['department_id', 'name', 'sanctioned', 'released', 'utilized'];

    protected $casts = [
        'name' => CleanHtmlInput::class,
        'sanctioned' => 'decimal:2',
        'released' => 'decimal:2',
        'utilized' => 'decimal:2',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
