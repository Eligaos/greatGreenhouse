<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class TiposLeituraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_leitura')->insert([
            [
            'parametro' => 'Humidade',
            'unidade' => '%'
            ],
            [
            'parametro' => 'Temperatura Atmosférica',
            'unidade' => 'ºC'
            ],
            [
            'parametro' => 'Radiação Solar',
            'unidade' => 'W/m2'
            ],
            [
            'parametro' => 'Pressão Atmosférica',
            'unidade' => '  mb'
            ]
            ]);
    }
}

