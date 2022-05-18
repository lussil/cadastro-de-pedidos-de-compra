<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nome' => 'Lucas',
            'email' => 'lucas@email.com',
            'cpf' => '62547832070',
        ]);
        Cliente::create([
            'nome' => 'usuario',
            'email' => 'usuario@email.com',
            'cpf' => '76447802033',
        ]);
        Cliente::create([
            'nome' => 'Camila',
            'email' => 'Camila@email.com',
            'cpf' => '54819155024',
        ]);
        Cliente::create([
            'nome' => 'Jorge',
            'email' => 'Jorge@email.com',
            'cpf' => '15390706030',
        ]);
    }
}
