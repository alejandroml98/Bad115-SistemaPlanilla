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
        // $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        $this->call(ProfesionSeeder::class);
        $this->call(TipoIngresosSeeder::class);
        $this->call(TipoDescuentoSeeder::class);
        $this->call(TipoDocumentoSeeder::class);
        $this->call(RentaSeeder::class);
        $this->call(RangoSalarialSeeder::class);


        
    }
}
