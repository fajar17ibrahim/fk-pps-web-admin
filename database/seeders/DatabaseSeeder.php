<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            UstadzSeeder::class,
            SchoolSeeder::class,
            KelompokMapelSeeder::class,
            SantriSeeder::class,
            KelasSeeder::class,
            MapelSeeder::class,
            SchoolYearSeeder::class,
            SemesterSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            GraduationSeeder::class,
            MutationSeeder::class,
            NewsSeeder::class,
            ReportEquipmentSeeder::class,
            ReportPrintSeeder::class,
            MasterBookSeeder::class,
            ReportValueSeeder::class,
            ReportExtrakurikulerSeeder::class,
            ReportAchievementSeeder::class,
            ReportAttendanceSeeder::class,
            ReportAttitudeSeeder::class,
            ReportHomeRoomTeacherSeeder::class,
            ReportValueLastSeeder::class,
            KDSkillsSeeder::class,
            KDKnowledgeSeeder::class,
            ExtrakurikulerSeeder::class
        ]);
    }
}
