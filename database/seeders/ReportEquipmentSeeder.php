<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportEquipment;

class ReportEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $reportEquipment = new ReportEquipment;
        $reportEquipment->santri_id = '0987654321';
        $reportEquipment->equipment_date_download = tanggal('now');
        $reportEquipment->save();
    }
}
