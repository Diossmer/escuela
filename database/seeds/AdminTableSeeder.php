<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

use Carbon\Carbon;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('users')->insert([
        //     'nombre' => 'administrador',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('1234'),
        //     'created_at' => carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        $role_admin = Role::where('nombre','administrador')->first();

        $user =User::create([
            'nombre'=>'Eduardo',
            'seg_nombre'=>'Pérez',
            'apellido'=>'Villamizar',
            'seg_apellido'=>'González',
            'fecha'=>'2020-06-15',
            'nacionalidad'=>'Venezolano',
            'localidad'=>'Caracas',
            'direccion'=>'https://github.com/fzaninotto/Faker',
            'telefono'=>'04164618675',
            'email'=>'admin@email.com',
            'password'=> Hash::make('1234'),
            'created_at' => carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $user->roles()->attach($role_admin);

        factory(User::class,10)->create()->each(function(User $user){
            $user->roles()->attach(rand(1,2));
        });

        $role_docente = Role::where('nombre', 'docente')->first();

        $user =User::create([
            'nombre'=>'Diossmer',
            'seg_nombre'=>'Pérez',
            'apellido'=>'Villamizar',
            'seg_apellido'=>'González',
            'fecha'=>'1993-12-14',
            'nacionalidad'=>'Venezolano',
            'localidad'=>'Caracas',
            'direccion'=>'https://github.com/fzaninotto/Faker',
            'email'=>'diossmer@gmail.com',
            'password'=> Hash::make('1234'),
            'created_at' => carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $user->roles()->attach($role_docente);
    }
}
