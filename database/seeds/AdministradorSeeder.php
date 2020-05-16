<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrador')->insert([
            'email' => 'roberto_123_2000@hotmail.com',
            'password' => '$2y$10$uhCdm4QBqsrS6eILsBZXVubBhbQquz5DFnccSGy2MyJzUIzK8VsTu',
        ]);
    }
}
//nameDB: id13676411_edungo	
//userDB: id13676411_root	
//hostDB: localhost
//passwordDB: 9RFPvoeTs_?@F}*w

//app_key_savedata(guardada por si acaso .env)=base64:bv93awGC+xzmma9lvA/A0p6G6UNiACpXoEUFPZHvmwg=