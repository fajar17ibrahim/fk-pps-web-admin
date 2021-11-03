<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBook extends Model
{
    use HasFactory;
    protected $table = "master_book";
    protected $primaryKey = 'report_id';

    public function reportPrint()
    {
        return $this->belongsTo(ReportPrint::class);
    }
}
