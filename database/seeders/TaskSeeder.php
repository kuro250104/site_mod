<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $datas = [
            "Production",
            "Nettoyage",
            "Préparation",
            "Formation",
            "Contrôle",
            "Attente",
            "Autre",

        ];
        foreach ($datas as $data) {
            \DB::table('tasks')->insert(['name'=>$data]);
        }
    }
}
