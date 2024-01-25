<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hours = [
            ["name" => "Journée ( 6 heures )", "value" => 6],
            ["name" => "Matin ( 7 heures )", "value" => 7],
            ["name" => "Après-midi ( 7 heures )", "value" => 7],
            ["name" => "Nuit ( 8,5 heures )", "value" => 8.5],
            ["name" => "Demi-nuit ( 6 heures )", "value" => 6],
        ];

        foreach ($hours as $hour) {
            \DB::table('hours')->insert($hour);
        }
    }
}
