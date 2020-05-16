<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Datos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categoria')->insert([
            'nombre' => 'Universitario',
        ],
        [
            'nombre' => 'Colegial',
        ]
        );

        DB::table('area')->insert(
        [
            'nombre' => 'Ingenieria',
            'id_categoria'=> '1'
        ],    
        [
            'nombre' => 'Primaria',
            'id_categoria'=>'2'
        ],
        [
            'nombre' => 'Secundaria',
            'id_categoria'=>'2'
        ]
        );

        DB::table('materia')->insert(
            [
            'nombre' => 'Calculo 1',
            'id_area'=>'1'
            ],
            [
                'nombre' => 'Matematias',
                'id_area'=>'2'
                ],
                [
                    'nombre' => 'Matematicas',
                    'id_area'=>'3'
                    ],
    );

    }
}
