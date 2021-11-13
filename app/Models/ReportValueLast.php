<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportValueLast extends Model
{
    use HasFactory;
    protected $table = "report_value_last";
    protected $primaryKey = 'report_value_last_id';

    public function reportValueLast()
    {
        return $this->belongsTo(ReportValueLast::class);
    }
}
