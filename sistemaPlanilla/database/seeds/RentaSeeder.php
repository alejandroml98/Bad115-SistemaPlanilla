<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Double;

class RentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rentas')->insert([
            'valMin' => (316.67),
            'valMax'=> (469.05),
            'valorFijo' => (4.77),
            'exceso'=>(0.10),
            'periodo'=> 'T'
        ]);
        DB::table('rentas')->insert([
            'valMin' => 469.05,
            'valMax'=> 761.91,
            'valorFijo' => 4.77,
            'exceso'=>0.10,
            'periodo'=> 'T'
        ]);

        DB::table('rentas')->insert([
                'valMin' => 761.91,
                'valMax'=> 1904.69,
                'valorFijo' => 60,
                'exceso'=>0.20,
                'periodo'=> 'T'
        ]);

        DB::table('rentas')->insert([
            'valMin' => 1904.69 ,
            'valMax'=> 100000,
            'valorFijo' => 228.57,
            'exceso'=>0.30,
            'periodo'=> 'T'
    ]);
        
        
    }
}
