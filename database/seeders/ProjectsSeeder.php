<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $datas = [
            "AM275",
            "BCA750",
            "BCB760",
            "BIN749",
            "CAV718",
            "CAV728",
            "CH261",
            "CS418",
            "DMA685",
            "HTS723",
            "JO1016",
            "LO287",
            "NAC699",
            "NE234",
            "NEB654",
            "PB259",
            "PB90",
            "PH720",
            "PIO492",
            "PPP758",
            "SAFI719",
            "SUL697",
            "TI627/TM100",
            "TMP747",
            "TR1100",
            "TGA765",
            "DDX768",
            "CAV769",
        ];
        foreach($datas as $data) {
            \DB::table('projects')->insert(['name'=>$data]);
        }
    }
}
