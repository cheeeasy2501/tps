<?php

namespace Database\Seeders;

use App\Database\Mock\BrandMock;
use App\Models\Brand;
use Database\Factories\ItemFactory;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    use BrandMock;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->videoCardBrandMock() as $id => $name) {
            Brand::query()->create(
                [
                    'id' => $id,
                    'category_id' => 1,
                    'name' => $name,
                ]
            );
        }
    }
}
