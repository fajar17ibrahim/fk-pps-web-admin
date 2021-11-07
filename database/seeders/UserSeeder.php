<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = new User;
        $user->name = "CEO";
        $user->email = "ceo@gmail.com";
        $user->role_id = "1";
        $user->status = "Aktif";
        $user->login_date = tanggal('now');
        $user->password = Hash::make('1234567890');
        $user->save();

        $user = new User;
        $user->name = "Admin Ula";
        $user->email = "admin-ula@gmail.com";
        $user->role_id = "2";
        $user->status = "Aktif";
        $user->login_date = tanggal('now');
        $user->password = Hash::make('1234567890');
        $user->save();

        $user = new User;
        $user->name = "Admin Wustha";
        $user->email = "admin-wustha@gmail.com";
        $user->role_id = "2";
        $user->status = "Aktif";
        $user->login_date = tanggal('now');
        $user->password = Hash::make('1234567890');
        $user->save();

        $user = new User;
        $user->name = "Admin Ulya";
        $user->email = "admin-ulya@gmail.com";
        $user->role_id = "2";
        $user->status = "Aktif";
        $user->login_date = tanggal('now');
        $user->password = Hash::make('1234567890');
        $user->save();

        $user = new User;
        $user->name = "Wali Kelas";
        $user->email = "walikelas@gmail.com";
        $user->role_id = "3";
        $user->status = "Aktif";
        $user->login_date = tanggal('now');
        $user->password = Hash::make('1234567890');
        $user->save();

        $user = new User;
        $user->name = "Guru";
        $user->email = "guru@gmail.com";
        $user->role_id = "4";
        $user->status = "Aktif";
        $user->login_date = tanggal('now');
        $user->password = Hash::make('1234567890');
        $user->save();
    
    }
}
