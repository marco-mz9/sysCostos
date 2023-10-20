<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{

    public function run():void
    {
        $taxes = [
            '12%',
            '0%'
        ];

        foreach ($taxes as $tax) {
            Tax::create(['name' => $tax, 'state' => 1]);
        }
    }
}
