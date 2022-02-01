<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::insert([
            [
                 'permission_name' => 'dashboard' // 1
            ],
            [
                 'permission_name' => 'user-profile' // 2
            ],
            [
                 'permission_name' => 'school-profile' // 3
            ],
            [
                 'permission_name' => 'report-uquipment' // 4
            ],
            [
                 'permission_name' => 'report-print' // 5
            ],
            [
                 'permission_name' => 'report-input' // 6
            ],
            [
                 'permission_name' => 'masterbook' // 7
            ],
            [
                 'permission_name' => 'master-class' // 8
            ],
            [
                 'permission_name' => 'master-mapel' // 9
            ],
            [
                 'permission_name' => 'master-pkpps' // 10
            ],
            [
                 'permission_name' => 'master-semester' // 11
            ],
            [
                 'permission_name' => 'master-school-year' // 12
            ],
            [
                 'permission_name' => 'master-santri' // 13
            ],
            [
                 'permission_name' => 'master-teacher' // 14
            ],
            [
                 'permission_name' => 'relation-homeroom-teacher' // 15
            ],
            [
                 'permission_name' => 'relation-mapel-teacher' // 16
            ],
            [
                 'permission_name' => 'graduation' // 17
            ],
            [
                 'permission_name' => 'mutation' // 18
            ],
            [
                 'permission_name' => 'curriculum' // 19
            ],
            [
                 'permission_name' => 'user' // 20
            ],
            [
                 'permission_name' => 'add-data' // 21
            ],
            [
                 'permission_name' => 'edit-data' // 22
            ],
            [
                 'permission_name' => 'delete-data' // 23
            ],
            [
                 'permission_name' => 'report-value' // 24
            ],
            [
                 'permission_name' => 'report-attitude' // 25
            ],
            [
                 'permission_name' => 'report-attendance' // 26
            ],
            [
                 'permission_name' => 'report-extrakurikuler' // 27
            ],
            [
                 'permission_name' => 'report-achievement' // 28
            ],
            [
                 'permission_name' => 'report-homeroom-teacher' // 29
            ],
            [
                 'permission_name' => 'master-relation-admin' // 30
            ],
            [
                 'permission_name' => 'master-relation-headmaster' // 31
            ],
            [
                 'permission_name' => 'changepassword' // 32
            ]          
        ]);

        $ceo = Role::where('role_name', 'ceo')->first();
        $ceo->permission()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32]);

        $admin = Role::where('role_name', 'admin')->first();
        $admin->permission()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32]);

        $homeroomTeacher = Role::where('role_name', 'homeroom-teacher')->first();
        $homeroomTeacher->permission()->attach([1, 2, 3, 4, 5, 6, 7, 9, 13, 17, 18, 19, 24, 25, 26, 27, 28, 29]);

        $teacher = Role::where('role_name', 'teacher')->first();
        $teacher->permission()->attach([1, 2, 3, 4, 5, 6, 7, 13, 17, 18, 19, 24]);
    }
}
