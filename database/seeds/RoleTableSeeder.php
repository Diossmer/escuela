<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rol=['Administrador','Docente'];
        foreach ($rol as $roles) {
            Role::create([
                'nombre' => $roles
            ]);
        }
    }
}
