<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pedido;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pedido::create([
            'cliente_id' => '1',
            'data_pedido' => '2022-05-21',
            'status' => 'A',
        ]);
        Pedido::create([
            'cliente_id' => '2',
            'data_pedido' => '2022-05-21',
            'status' => 'A',
        ]);
        Pedido::create([
            'cliente_id' => '3',
            'data_pedido' => '2022-05-21',
            'status' => 'A',
        ]);
        Pedido::create([
            'cliente_id' => '4',
            'data_pedido' => '2022-05-21',
            'status' => 'A',
        ]);
    }
}
