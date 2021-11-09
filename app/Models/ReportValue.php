<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportValue extends Model
{
    use HasFactory;

    protected $table = "report_value";
    protected $primaryKey = 'report_value_id';

    public function reportValue()
    {
        return $this->belongsTo(ReportValue::class);
    }
}
