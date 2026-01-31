<?php

namespace App\Models\MIS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pia extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mis_pia';

    protected $fillable = [
        'sector_id',
        'name',
        'effective_date',
        'status'
    ];

    public function sector(){
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
