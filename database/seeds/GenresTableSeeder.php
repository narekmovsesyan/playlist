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
                'title' => 'Rap'
            ],
            [
                'id'         => 2,
                'title' => 'Rock'
            ],
            [
                'id'         => 3,
                'title' => 'Melody'
            ],
            [
                'id'         => 4,
                'title' => 'Pop'
            ]
        ];

        DB::table('Genres')->insert($types);
    }
}
