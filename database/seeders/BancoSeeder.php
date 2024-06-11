<?php

namespace Database\Seeders;

use App\Models\Banco;
use Illuminate\Database\Seeder;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banco::create([
            'nombre'=> 'Banco Estado',
        ]);

        Banco::create([
            'nombre'=> 'Banco Internacional',
        ]);

        Banco::create([
            'nombre'=> 'Banco Scotiabank',
        ]);

        Banco::create([
            'nombre'=> 'Banco Chile',
        ]);
    }
}
