<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert(
            [
                [
                    'name' => 'Задача 1',
                    'priority_id' => 1,
                    'done' => false,
                ],
                [
                    'name' => 'Задача 2',
                    'priority_id' => 2,
                    'done' => false,
                ],
                [
                    'name' => 'Задача 3',
                    'priority_id' => 1,
                    'done' => true,
                ],
            ]
        );
    }
}
