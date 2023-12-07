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
            "BEZIE / RAMPONT",
            "ESNAULT / GUENGANT",
            "FAUCHON / MANCEAU",
            "NON RENSEINGÉ"

        ];
        foreach ($datas as $data) {
            \DB::table('teams')->insert(['name'=>$data]);
        }
    }
}
