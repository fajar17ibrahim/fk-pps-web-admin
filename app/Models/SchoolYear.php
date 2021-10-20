<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    protected $table = "tahun_pelajaran";
    protected $primaryKey = 'tahun_pelajaran_id';

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }
}
