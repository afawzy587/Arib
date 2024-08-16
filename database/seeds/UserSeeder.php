<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();

        $user=User::create([
            'first_name' => 'Manager',
            'last_name' => 'Arib',
            'email'    => 'Manger@arib.com',
            'phone'    => '0111111111111',
            'password' => Hash::make('P@ss1234'), // password
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
