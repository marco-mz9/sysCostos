<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classifications = [
            'MP',
            'MO',
            'CIF',
            'GA',
            'GF',
            'GV'
        ];

        foreach ($classifications as $classification) {
            Classification::create(['name' => $classification, 'state' => 1]);
        }
    }
}
