<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concentration extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'code', 'name', 'status', 'program_study_id'
    ];

    public function program_study()
    {
        return $this->belongsTo(ProgramStudy::class);
    }
}
