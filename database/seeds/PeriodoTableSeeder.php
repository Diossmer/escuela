<?php

use App\Docente\Periodo;
use App\User;
use Illuminate\Database\Seeder;

class PeriodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Periodo::class,5)->create();
    }
}
