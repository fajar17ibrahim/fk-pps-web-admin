<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    protected $table = "curriculum";
    protected $primaryKey = 'curriculum_id';

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
