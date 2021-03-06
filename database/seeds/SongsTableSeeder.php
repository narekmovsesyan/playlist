<?php

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
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
                'title' => 'Интро(Баста)',
                'singer' => 'Баста',
                'file_name' => "Интро(Баста).mp4",
                'creator_id' => 1,
                'genre_id' => '1'
            ],
            [
                'id'         => 2,
                'title' => 'КороЧЕ(Баста)',
                'singer' => 'Баста',
                'file_name' => "КороЧЕ(Баста).mp4",
                'creator_id' => 1,
                'genre_id' => '1'
            ],
            [
                'id'         => 3,
                'title' => 'Лес(Баста)',
                'singer' => 'Баста',
                'file_name' => "Лес(Баста).mp4",
                'creator_id' => 1,
                'genre_id' => '1'
            ],
            [
                'id'         => 4,
                'title' => 'Не путай(Баста)',
                'singer' => 'Баста',
                'file_name' => "Не-путай(Баста).mp4",
                'creator_id' => 1,
                'genre_id' => '1'
            ],
            [
                'id'         => 5,
                'title' => 'Беги(Баста)',
                'singer' => 'Баста',
                'file_name' => "Беги(Баста).mp4",
                'creator_id' => 1,
                'genre_id' => '1'
            ],
            [
                'id'         => 6,
                'title' => 'Бэйби бой(Баста)',
                'singer' => 'Баста',
                'file_name' => "Бэйбибой(Баста).mp4",
                'creator_id' => 1,
                'genre_id' => '1'
            ],
            [
                'id'         => 7,
                'title' => 'Ролексы(Баста)',
                'singer' => 'Баста',
                'file_name' => "Ролексы(Баста).mp4",
                'creator_id' => 1,
                'genre_id' => '1'
            ],
            [
                'id'         => 8,
                'title' => 'Роза ветров(Баста)',
                'singer' => 'Баста',
                'file_name' => "Ноггано-РозаВетров.mp4",
                'creator_id' => 1,
                'genre_id' => '1'
            ],
            [
                'id'         => 9,
                'title' => 'Прикури от ствола(Баста)',
                'singer' => 'Баста',
                'file_name' => "Прикуриот-ствола(Баста).mp4",
                'creator_id' => 1,
                'genre_id' => '1'
            ],
            [
                'id'         => 10,
                'title' => 'Окраина(Баста)',
                'singer' => 'Баста',
                'file_name' => "Окраина(Баста).mp4",
                'creator_id' => 1,
                'genre_id' => '1'
            ],
            [
                'id'         => 11,
                'title' => 'А зори здесь тихие(Любэ)',
                'singer' => 'Любэ',
                'file_name' => "Н.Расторгуев и ЛЮБЭ А.Филатов и офицеры группы Альфа А зори здесь тихие-тихие.mp4",
                'creator_id' => 1,
                'genre_id' => '2'
            ],
            [
                'id'         => 12,
                'title' => 'Атас(Любэ)',
                'singer' => 'Любэ',
                'file_name' => "ЛЮБЭ Атас (концерт КОМБАТ 1996).mp4",
                'creator_id' => 1,
                'genre_id' => '2'
            ],
            [
                'id'         => 13,
                'title' => 'Бабушка(Любэ)',
                'singer' => 'Любэ',
                'file_name' => "ЛЮБЭ- Бабушка.mp4",
                'creator_id' => 1,
                'genre_id' => '2'
            ],
            [
                'id'         => 14,
                'title' => 'Батька Махно(Любэ)',
                'singer' => 'Любэ',
                'file_name' => "БАТЬКА МАХНО - ЛЮБЭ.mp4",
                'creator_id' => 1,
                'genre_id' => '2'
            ],
            [
                'id'         => 15,
                'title' => 'Белый Лебедь(Любэ)',
                'singer' => 'Любэ',
                'file_name' => "Белый лебедь_ЛЮБЭ.mp4",
                'creator_id' => 1,
                'genre_id' => '2'
            ],
            [
                'id'         => 16,
                'title' => 'Берёзы(Любэ)',
                'singer' => 'Любэ',
                'file_name' => "ЛЮБЭ Березы.mp4",
                'creator_id' => 1,
                'genre_id' => '2'
            ],
//            [
//                'id'         => 17,
//                'name' => 'Было время, был я беден(Любэ)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '2'
//            ],
//            [
//                'id'         => 18,
//                'name' => 'Давай Наяривай(Любэ)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '2'
//            ],
//            [
//                'id'         => 19,
//                'name' => 'Давай За(Любэ)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '2'
//            ],
//            [
//                'id'         => 20,
//                'name' => 'Дед(Любэ)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '2'
//
//            ],
//            [
//                'id'         => 21,
//                'name' => 'Как ты прекрасна(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//
//            ],
//            [
//                'id'         => 22,
//                'name' => 'Пальма де Майорка(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//
//            ],
//            [
//                'id'         => 23,
//                'name' => 'Контрасты(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//
//            ],
//            [
//                'id'         => 24,
//                'name' => 'Затерянный берег (ст. К. Арсенев)(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//
//            ],
//            [
//                'id'         => 25,
//                'name' => 'Ветка каштана (ст. Е. Муравьёв)(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//
//            ],
//            [
//                'id'         => 26,
//                'name' => 'Хрустальный бокал (ст. Т. Назарова)(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//
//            ],
//            [
//                'id'         => 27,
//                'name' => 'Москва слезам не верит (ст. И. Николаев)(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//
//            ],
//            [
//                'id'         => 28,
//                'name' => 'Мой друг (ст. И. Николаев)(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3'
//            ],
//            [
//                'id'         => 29,
//                'name' => 'Третье сентября (ст. И. Николаев)(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//
//            ],
//            [
//                'id'         => 30,
//                'name' => 'Навсегда (ст. И. Седов)(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//
//            ],
//            [
//                'id'         => 31,
//                'name' => 'Маленькое кафе (ст. Л. Фадеев)(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//
//            ],
//            [
//                'id'         => 32,
//                'name' => 'Пусть тебе приснится Пальма-де-Майорка (ст. Л. Фадеев)(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//
//            ],
//            [
//                'id'         => 33,
//                'name' => 'В море ходят пароходы (ст. И. Шаферан)(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//            ],
//            [
//                'id'         => 34,
//                'name' => 'Затерянный берег (ст. К. Арсенев)(Игорь Крутой)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '3',
//
//            ],
//            [
//                'id'         => 35,
//                'name' => 'Бай-бай(Не пара)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '4',
//
//            ],
//            [
//                'id'         => 36,
//                'name' => 'Беги, беги(Не пара)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '4',
//
//            ],
//            [
//                'id'         => 37,
//                'name' => 'Бог тебя выдумал(Не пара)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '4',
//
//            ],
//            [
//                'id'         => 38,
//                'name' => 'Будет все(Не пара)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '4'
//            ],
//            [
//                'id'         => 39,
//                'name' => 'В облаках(Не пара)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '4',
//
//            ],
//            [
//                'id'         => 40,
//                'name' => 'Вздох – взгляд(Не пара)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '4',
//
//            ],
//            [
//                'id'         => 41,
//                'name' => 'Взлетай(Не пара)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '4',
//
//            ],
//            [
//                'id'         => 42,
//                'name' => 'Вокзал на двоих(Не пара)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '4',
//
//            ],
//            [
//                'id'         => 43,
//                'name' => 'Долгими разговорами(Не пара)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '4',
//            ],
//            [
//                'id'         => 44,
//                'name' => 'Домой(Не пара)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '4',
//
//            ],
//            [
//                'id'         => 45,
//                'name' => 'Другая причина(Не пара)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '4',
//
//            ],
//            [
//                'id'         => 46,
//                'name' => 'Её звали Америка(Не пара)',
//                'file_name' => ,
//                'creator_id' => 1,
//                'genre_id' => '4',
//            ]
        ];

        DB::table('Songs')->insert($types);
    }
}
