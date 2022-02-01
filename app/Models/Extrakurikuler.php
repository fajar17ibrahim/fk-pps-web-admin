<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extrakurikuler extends Model
{
    use HasFactory;

    protected $table = "extrakurikuler";
    protected $primaryKey = 'extra_id';

    public function extrakurikuler()
    {
        return $this->belongsTo(Extrakurikuler::class);
    }
}
