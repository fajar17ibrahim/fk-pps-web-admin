<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KDSkills extends Model
{
    use HasFactory;

    protected $table = "kd_skills";
    protected $primaryKey = 'id';

    public function kdSkills()
    {
        return $this->belongsTo(KDSkills::class);
    }
}
