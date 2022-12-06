<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
