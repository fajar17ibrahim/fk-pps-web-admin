<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
    use HasFactory;

    protected $table = "mutation";
    protected $primaryKey = 'mutation_id';

    public function mutation()
    {
        return $this->belongsTo(Mutation::class);
    }
}
