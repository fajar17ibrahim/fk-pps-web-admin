<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduation extends Model
{
    use HasFactory;

    protected $table = "graduation";
    protected $primaryKey = 'graduation_id';

    public function graduation()
    {
        return $this->belongsTo(Graduation::class);
    }
}
