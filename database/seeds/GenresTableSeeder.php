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
                'title' => 'Баста'
            ],
            [
                'id'         => 2,
                'title' => 'Любэ'
            ],
            [
                'id'         => 3,
                'title' => 'Игорь Крутой'
            ],
            [
                'id'         => 4,
                'title' => 'Не пара'
            ]
        ];

        DB::table('Genres')->insert($types);
    }
}
