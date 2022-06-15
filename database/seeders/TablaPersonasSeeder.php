<?php

namespace Database\Seeders;

use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TablaPersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Persona::create([
            'name'=>"Nicolas Rodriguez",
            'fecha'=> Carbon::parse('2000-01-01'),
            'Matricula'=>"ABC999"
        ]);
        Persona::create([
            'name'=>"Pepe Rodriguez",
            'fecha'=> Carbon::parse('2000-01-01'),
            'Matricula'=>"ABC999"
        ]);
        Persona::create([
            'name'=>"Pepe Rodriguez",
            'fecha'=> Carbon::parse('2000-01-01'),
            'Matricula'=>"ABC999"
        ]);
    }
}
