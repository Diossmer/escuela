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
        $role_docente = Role::where('nombre', 'docente')->first();
        $user =User::create([
            'nombre'=>'Administrador',
            'email'=>'admin@email.com',
            'password'=> Hash::make('1234'),
            'created_at' => carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $user->roles()->attach($role_admin);
        $user =User::create([
            'nombre'=>'Docente',
            'email'=>'user@email.com',
            'password'=> Hash::make('1234'),
            'created_at' => carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $user->roles()->attach($role_docente);
    }
}
