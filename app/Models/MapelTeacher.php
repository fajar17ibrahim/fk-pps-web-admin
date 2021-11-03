<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapelTeacher extends Model
{
    use HasFactory;

    protected $table = "mapel_teacher";
    protected $primaryKey = 'mapel_teacher_id';

    public function mapelTeacher()
    {
        return $this->belongsTo(MapelTeacher::class);
    }
}
