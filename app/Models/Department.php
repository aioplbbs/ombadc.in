<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['page_id', 'name', 'short_name', 'sanctioned', 'released', 'utilized'];

    public function sector()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }
}
