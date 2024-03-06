<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $datas = [
            "BENETEAU / BLANCHARD",
            "MANCEAU / BEZIE",
            "ESNAULT / GUENGANT",
            "FAUCHON / BOUGOULA",
            "N.A"

        ];
        foreach ($datas as $data) {
            \DB::table('teams')->insert(['name'=>$data]);
        }
    }
}
