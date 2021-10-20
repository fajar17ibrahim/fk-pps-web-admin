<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokMapel extends Model
{
    use HasFactory;

    protected $table = "kelompok_mapel";
    protected $primaryKey = 'kelompok_id';

    public function kelompokMapel()
    {
        return $this->belongsTo(KelompokMapel::class);
    }
}
