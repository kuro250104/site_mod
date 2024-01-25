<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Team;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        \App\Models\Worker::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call([
            StatusSeeder::class,
            ProjectsSeeder::class,
//            StageSeeder::class,
            TeamSeeder::class,
            TaskSeeder::class,
            HourSeeder::class,
//            WorkerSeeder::class,
        ]);
    }
}
