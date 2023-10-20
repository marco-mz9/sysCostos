<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{

    public function run():void
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
