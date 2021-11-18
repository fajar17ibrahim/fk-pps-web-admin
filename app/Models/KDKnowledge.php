<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KDKnowledge extends Model
{
    use HasFactory;
    protected $table = "kd_knowledge";
    protected $primaryKey = 'id';

    public function kdKnowlege()
    {
        return $this->belongsTo(KDKnowledge::class);
    }
}
