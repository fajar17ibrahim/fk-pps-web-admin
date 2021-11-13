<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportAttendance extends Model
{
    use HasFactory;
    protected $table = "report_attendance";
    protected $primaryKey = 'report_attendance_id';

    public function attendance()
    {
        return $this->belongsTo(ReportAttendance::class);
    }
}
