<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportHomeRoomTeacher extends Model
{
    use HasFactory;
    protected $table = "report_home_room_teacher";
    protected $primaryKey = 'report_home_room_teacher_id';

    public function homeRoomTeacher()
    {
        return $this->belongsTo(ReportHomeRoomTeacher::class);
    }
}
