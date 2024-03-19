<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'n',
            'email' => 'admin@admin.admin',
            'password' => Hash::make('admin')
        ]);
        User::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            ItemSeeder::class,
        ]);
    }
}
