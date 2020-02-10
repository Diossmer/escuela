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
        $rol=['administrador', 'docente'];
        foreach ($rol as $roles) {
            Role::create([
                'name' => $roles
            ]);
        }
    }
}
