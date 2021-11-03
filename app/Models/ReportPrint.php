<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportPrint extends Model
{
    use HasFactory;

    protected $table = "report_print";
    protected $primaryKey = 'report_id';

    public function reportPrint()
    {
        return $this->belongsTo(ReportPrint::class);
    }
}
