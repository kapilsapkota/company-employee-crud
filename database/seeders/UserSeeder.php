<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Schema::disableForeignKeyConstraints();
//        DB::table('users')->truncate();
//        Schema::enableForeignKeyConstraints();

        $superDev = User::create([
            'name'      => 'Kapil Sapkota',
            'email'     => 'kapil2054@gmail.com',
            'password'  => bcrypt('kapil2054'),
        ]);

        $superAdmin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('password'),
        ]);

        $superDev->assignRole('super-dev');

        $superAdmin->assignRole('super-dev');
    }
}
