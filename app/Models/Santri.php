<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $table = "santri";
    protected $primaryKey = 'santri_id';

    protected $fillable = [
        'santri_name'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
