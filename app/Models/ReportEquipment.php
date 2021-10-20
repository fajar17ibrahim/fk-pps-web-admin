<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportEquipment extends Model
{
    use HasFactory;

    protected $table = "equipment";
    protected $primaryKey = 'equipment_id';

    public function equipment()
    {
        return $this->belongsTo(ReportEquipment::class);
    }
}
