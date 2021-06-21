<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Ernesto';
        $user->email = 'Ernestoz@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('ernesto1');
        $user->activo = '1';
        $user->assignRole('empleado');
        $user->save();

        $user = new User;
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('Admin123');
        $user->activo = '1';
        $user->assignRole('admin');
        $user->save();

        $user = new User;
        $user->name = 'josue';
        $user->email = 'josue@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('josue123');
        $user->activo = '1';
        $user->assignRole('empleado');
        $user->save();

        $user = new User;
        $user->name = 'juan';
        $user->email = 'juan@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('juan123');
        $user->activo = '1';
        $user->assignRole('empleado');
        $user->save();

        $user = new User;
        $user->name = 'pedro';
        $user->email = 'pedro@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('pedro123');
        $user->activo = '1';
        $user->assignRole('empleado');
        $user->save();

        $user = new User;
        $user->name = 'maria';
        $user->email = 'maria@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('maria123');
        $user->activo = '1';
        $user->assignRole('empleado');
        $user->save();

        $user = new User;
        $user->name = 'Karla';
        $user->email = 'karla@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('aleman78');
        $user->activo = '1';
        $user->assignRole('empleado');
        $user->save();

        $user = new User;
        $user->name = 'hugo';
        $user->email = 'hugo@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('hugodi10');
        $user->activo = '1';
        $user->assignRole('Contador');
        $user->save();

        $user = new User;
        $user->name = 'Daniel';
        $user->email = 'daniel234@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('daniel45');
        $user->activo = '1';
        $user->assignRole('auxiliar de planilla');
        $user->save();

        $user = new User;
        $user->name = 'Lucas';
        $user->email = 'lucas4Ortiz@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('Ortiz11As');
        $user->activo = '1';
        $user->assignRole('empleado');
        $user->save();

        $user = new User;
        $user->name = 'Adrian';
        $user->email = 'Adrian7Cortez@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('Hernan34Ui');
        $user->activo = '1';
        $user->assignRole('empleado');
        $user->save();

        $user = new User;
        $user->name = 'Martin';
        $user->email = 'Martin12Cortez@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('maRtin34Ui');
        $user->activo = '1';
        $user->assignRole('empleado');
        $user->save();

        $user = new User;
        $user->name = 'Francisco';
        $user->email = 'Francisco1Javier@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('Francisco34');
        $user->activo = '1';
        $user->assignRole('empleado');
        $user->save();

        $user = new User;
        $user->name = 'Diego';
        $user->email = 'Diego1Arce@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('DiegoAe34');
        $user->activo = '1';
        $user->assignRole('empleado');
        $user->save();
        
        $user = new User;
        $user->name = 'JoseLuis';
        $user->email = 'Joseluis@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('Josueluis34');
        $user->activo = '1';
        $user->assignRole('empleado');
        $user->save();
    }
}
