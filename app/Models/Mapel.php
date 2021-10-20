<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = "mapel";
    protected $primaryKey = 'mapel_id';

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
