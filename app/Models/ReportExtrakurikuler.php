<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportExtrakurikuler extends Model
{
    use HasFactory;

    protected $table = "report_extrakurikuler";
    protected $primaryKey = 'report_extrakurikuler_id';

    public function extrakurikuler()
    {
        return $this->belongsTo(ReportExtrakurikuler::class);
    }
}
