<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $table = "semester";
    protected $primaryKey = 'semester_id';

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
