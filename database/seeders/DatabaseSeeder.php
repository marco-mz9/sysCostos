<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run():void
    {
        User::create([
            'name' => 'Marco',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $this->call([
            ClassificationSeeder::class,
            TaxSeeder::class,
        ]);

    }
}
