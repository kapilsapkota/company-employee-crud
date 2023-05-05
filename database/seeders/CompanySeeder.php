<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'name' => 'ABC Inc.',
                'email' => 'abc@example.com',
                'website' => 'https://www.abcinc.com',
            ],
            [
                'name' => 'XYZ Ltd.',
                'email' => 'xyz@example.com',
                'website' => 'https://www.xyzltd.com',
            ],
            [
                'name' => 'DEF Inc.',
                'email' => 'def@example.com',
                'website' => 'https://www.abcinc.com',
            ],
            [
                'name' => 'ABC Inc.',
                'email' => 'abc@example.com',
                'website' => 'https://www.abcinc.com',
            ],
            [
                'name' => 'SASA Inc.',
                'email' => 'sasa@example.com',
                'website' => 'https://www.abcinc.com',
            ],
            [
                'name' => 'BASA Inc.',
                'email' => 'basa@example.com',
                'website' => 'https://www.abcinc.com',
            ],[
                'name' => 'MASA Inc.',
                'email' => 'masa@example.com',
                'website' => 'https://www.abcinc.com',
            ],
            [
                'name' => 'TASA Inc.',
                'email' => 'tasa@example.com',
                'website' => 'https://www.abcinc.com',
            ],
            [
                'name' => 'ASHA Inc.',
                'email' => 'Asha@example.com',
                'website' => 'https://www.abcinc.com',
            ],[
                'name' => 'Masha Inc.',
                'email' => 'masha@example.com',
                'website' => 'https://www.abcinc.com',
            ],
            [
                'name' => 'Sasha Inc.',
                'email' => 'sasha@example.com',
                'website' => 'https://www.abcinc.com',
            ],

        ];

        DB::table('companies')->insert($companies);
    }
}
