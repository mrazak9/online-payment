<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramStudy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 'name', 'status', 'faculty_id'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
