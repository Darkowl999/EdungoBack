<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categoria')->insert([
        [
            'nombre' => 'Universitario',
        ],
        [
            'nombre' => 'Colegial',
        ]
        ]
        );

        DB::table('area')->insert([
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
        ]
        );

        DB::table('materia')->insert(
            [
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
                ]
            ]

        );

        DB::table('persona')->insert(
            [
                [
                'id'=>'1',
                'nombre'=>'roberto',
                'password'=>Hash::make('12345678'),
                'apellido'=>'Dominguez',
                'nombre_usuario'=>'Agente0333',
                'telefono'=>'78579772',
                'sexo'=>'M',
                'email'=>'roberto@gmail.com',
                'direccion'=>'urb cotoca',
                'fecha_nacimiento'=>'2000-04-02',
                ],
                [
                    'id'=>'2',
                    'nombre'=>'Erick',
                    'password'=>Hash::make('12345678'),
                    'apellido'=>'Patton',
                    'nombre_usuario'=>'Gomito',
                    'telefono'=>'78579772',
                    'sexo'=>'M',
                    'email'=>'roberto_123_2000@gmail.com',
                    'direccion'=>'urb cotoca',
                    'fecha_nacimiento'=>'2000-04-02',
                ]
            ]

        );

        DB::table('estudiante')->insert(
            [
                [
                'id_persona'=>'1'
                ],
                [
                    'id_persona'=>'2',
                ]
            ]
        );

        DB::table('auxiliar')->insert(
            [
                [
                    'id_persona'=>'2',
                    'ci'=>'8235543',
                    'foto_carnet'=>'',
                    'ganancia'=>'0',
                    'habilitado'=>'1'
                ]
            ]
        );



    }
}
