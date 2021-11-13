<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportAchievement extends Model
{
    use HasFactory;
    protected $table = "report_achievement";
    protected $primaryKey = 'report_achievement_id';

    public function achievement()
    {
        return $this->belongsTo(ReportAchievement::class);
    }
}
