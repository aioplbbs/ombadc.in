<?php

namespace App\Models\MIS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "mis_departments";

    protected $fillable = [
        'sector_id', 
        'name', 
        'sanctioned', 
        'released', 
        'utilised', 
        'status'
    ];

    public function sector(){
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
