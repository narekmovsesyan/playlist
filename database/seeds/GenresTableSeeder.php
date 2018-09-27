<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'id'         => 1,
                'title' => 'Rap',
                'creator_id' => 1
            ],
            [
                'id'         => 2,
                'title' => 'Rock',
                'creator_id' => 1
            ],
            [
                'id'         => 3,
                'title' => 'Melody',
                'creator_id' => 1
            ],
            [
                'id'         => 4,
                'title' => 'Pop',
                'creator_id' => 1
            ]
        ];

        DB::table('Genres')->insert($types);
    }
}
