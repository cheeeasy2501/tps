<?php

namespace Database\Seeders;

use App\Database\Mock\BrandMock;
use App\Database\Mock\VideoCardMock;
use App\Models\Item;
use Database\Factories\ItemFactory;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    use VideoCardMock;
    use BrandMock;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->videoCardMock() as $value) {
            Item::query()->create(
                [
                    'brand_id' => \random_int(1, count($this->videoCardBrandMock())),
                    'name' => $value
                ]
            );
        }
    }
}
