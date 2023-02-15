<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicPeriod extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'academic_periods';

    protected $fillable = [
        'name', 'year', 'semester', 'start_date_study', 'end_date_study',
        'start_date_uts', 'end_date_uts', 'start_date_uas', 'end_date_uas',
        'status',
    ];
}
