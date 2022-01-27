<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert(
            ['id' => 1, 'name' => 'Рустем', 'review' => 'О сервисе могу сказать только положительное. Ребята делают все четко по времени, специалисты с хорошей подготовкой, с вариантами выбора выгульщика. Сервис мне очень нравится. Могу рекомендовать.', 'avatar' => '', 'grade' => 5]
        );
        DB::table('reviews')->insert(
            ['id' => 2, 'name' => 'Алена', 'review' => 'Очень удобный сервис для людей, любящих своих питомцев, у которых не всегда есть время на длительные прогулки ) спасибо вам! Молли очень полюбила свою выгульщицу Риту, ждёт ее с нетерпением', 'avatar' => '', 'grade' => 4]
        );
        DB::table('reviews')->insert(
            ['id' => 3, 'name' => 'Ирина', 'review' => 'Спасибо огромное Гуляй Виляй за помощь с нашим малышом во время карантина! Нашим выгульщиком стала Полина, внимательная девушка с очаровательным юмором. Наш такс влюбился и доверился ей с первой же встречи! Отдельное спасибо за милейшим отчётам по прогулкам! Я думаю Томми будет немного скучать по Полине ;)', 'avatar' => '', 'grade' => 3]
        );
        DB::table('reviews')->insert(
            ['id' => 4, 'name' => 'Лилия', 'review' => 'Замечательный сервис - выручалочка! Ребята, которым не страшно доверить своего любимого песика, все очень четко, пунктуально, ответственно. После каждой прогулки фоторепортаж и карта маршрута. С нами работает выгульщик Римма, для меня она как добрая фея, и погуляет, и лапки помоет)) Лимон каждый раз очень радуется Римме, когда он с ней, я абсолютно спокойна! Спасибо за помощь!', 'avatar' => '', 'grade' => 2],
        );

        DB::table('sitter_city_area_handbook')->insert(['city_area' => 'Север']);
        DB::table('sitter_city_area_handbook')->insert(['city_area' => 'Юг']);
        DB::table('sitter_city_area_handbook')->insert(['city_area' => 'Восток']);
        DB::table('sitter_city_area_handbook')->insert(['city_area' => 'Запад']);
        DB::table('sitter_city_area_handbook')->insert(['city_area' => 'Центр']);

        DB::table('sitter_animal_handbook')->insert(['animal' => 'Кошки']);
        DB::table('sitter_animal_handbook')->insert(['animal' => 'Собаки']);
        DB::table('sitter_animal_handbook')->insert(['animal' => 'Птицы']);
        DB::table('sitter_animal_handbook')->insert(['animal' => 'Рыбки']);
        DB::table('sitter_animal_handbook')->insert(['animal' => 'Грызуны']);
        DB::table('sitter_animal_handbook')->insert(['animal' => 'Экзотические животные']);

        DB::table('sitters')->insert(['id' => 1, 'name' => 'Jane', 'lastname' => 'Foster',  'text' =>'', 'number'=>'111', 'email' => '', 'socialmedia' => '', 'agreement' => true, 'image' => 'jane-foster.jpeg', 'created_at' => '2020-01-05']);
        DB::table('sitter_city_areas')->insert(['sitter_id' => 1, 'city_area' => 'Север']);
        DB::table('sitter_animals')->insert(['sitter_id' => 1, 'animal' => 'Собаки']);
        DB::table('sitter_reviews')->insert(['sitter_id' => 1, 'name' => '111', 'text' => '33232432','rating' => 5, 'thumbsUp' => 10, 'thumbsDown' => 5]);
        DB::table('sitter_reviews')->insert(['sitter_id' => 1, 'name' => '111', 'text' => '33232432','rating' => 4, 'thumbsUp' => 10, 'thumbsDown' => 5]);
        DB::table('sitter_reviews')->insert(['sitter_id' => 1, 'name' => '111', 'text' => '33232432','rating' => 3, 'thumbsUp' => 10, 'thumbsDown' => 5]);


        DB::table('sitters')->insert(['id' => 2, 'name' => 'Alex', 'lastname' => 'Rakatanski',  'text' =>'', 'number'=>'111', 'email' => '', 'socialmedia' => '', 'agreement' => true, 'image' => 'alex-rakatanski.jpeg', 'created_at' => '2021-01-05']);
        DB::table('sitter_city_areas')->insert(['sitter_id' => 2, 'city_area' => 'Центр']);
        DB::table('sitter_animals')->insert(['sitter_id' => 2, 'animal' => 'Кошки']);
        DB::table('sitter_reviews')->insert(['sitter_id' => 2, 'name' => '111', 'text' => '33232432','rating' => 5, 'thumbsUp' => 10, 'thumbsDown' => 5]);
        DB::table('sitter_reviews')->insert(['sitter_id' => 2, 'name' => '111', 'text' => '33232432','rating' => 1, 'thumbsUp' => 10, 'thumbsDown' => 5]);

        DB::table('sitters')->insert(['id' => 3, 'name' => 'Clay', 'lastname' => 'Rideaux',  'text' =>'', 'number'=>'111', 'email' => '', 'socialmedia' => '', 'agreement' => true, 'image' => 'clay-rideaux.jpeg', 'created_at' => '2021-01-05']);
        DB::table('sitter_city_areas')->insert(['sitter_id' => 3, 'city_area' => 'Север']);
        DB::table('sitter_animals')->insert(['sitter_id' => 3, 'animal' => 'Экзотические животные']);



    }
}
