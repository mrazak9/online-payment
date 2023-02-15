<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'nominal',
        'unit',
        'condition',
        'frequency_id'
    ];

    public function frequency()
    {
        return $this->belongsTo(Frequency::class, 'frequency_id');
    }
}
