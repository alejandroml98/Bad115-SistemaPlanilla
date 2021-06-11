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
        
        $this->call(RoleSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        $this->call(ProfesionSeeder::class);
        $this->call(TipoIngresosSeeder::class);
        $this->call(TipoDescuentoSeeder::class);
        $this->call(TipoDocumentoSeeder::class);
        $this->call(RentaSeeder::class);
        $this->call(RangoSalarialSeeder::class);
        $this->call(BancoSeeder::class);
        $this->call(CatalogoComisionSeeder::class);
        $this->call(TipoRegionSeeder::class);
        $this->call(PaisesSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(SubRegionSeeder::class);
        $this->call(DireccionSeeder::class);
        $this->call(PuestoSeeder::class);
        $this->call(CentroCostosSeeder::class);
        $this->call(TipoUnidadSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EmpleadoSeeder::class);

        
    }
}
