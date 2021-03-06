<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdministradorSeeder::class);
         $this->call(ConfiguracionSeeder::class);
         $this->call(DatosSeeder::class);
    }
}
