<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use CategoryMock;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       foreach ($this->categoriesMock() as $value) {
           Category::query()->create(
               [
                   'name' => $value
               ]
           );
       }
    }
}
