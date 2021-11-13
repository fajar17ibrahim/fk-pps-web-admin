<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportAttitude extends Model
{
    use HasFactory;
    protected $table = "report_attitude";
    protected $primaryKey = 'report_attitude_id';

    public function attitude()
    {
        return $this->belongsTo(ReportAttitude::class);
    }
}
