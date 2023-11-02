<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Organisme;
use App\Models\SubSector;
use App\Models\Sector;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CruiMembreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('organismes')->truncate();
        Schema::enableForeignKeyConstraints();
        Schema::disableForeignKeyConstraints();
        DB::table('members')->truncate();
        Schema::enableForeignKeyConstraints();
        $var =  [
            "Commune de MERS EL KHEIR" => [
                [
                    "first_name" => "YOUSSEF",
                    "last_name" => "SALIOUI",
                    "email" => "conventionrabatsalekenitra@amdie.gov.ma	",
                    "phone" => null,
                    "fix_phone" => "05 37 22 64 00",
                ]

            ],

        ];

        foreach ($var as $key => $value) {
            $organisme = Organisme::create([
                "name" => $key
            ]);
            foreach ($var[$key] as $member) {
                Member::create([

                    'first_name' => $member['first_name'],
                    'last_name' => $member['last_name'],
                    'email' => $member['email'],
                    'organisme_id' => $organisme->id,
                    'phone' => $member['phone'],
                    'fix_phone' => $member['fix_phone'],
                ]);
            }
        }
    }
}
