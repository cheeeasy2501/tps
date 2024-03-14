<?php

namespace Database\Seeders;

use App\Database\Mock\VideoCardMock;
use App\Models\Item;
use Database\Factories\ItemFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    use VideoCardMock;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->videoCardMock() as $value) {
            Item::query()->create(
                [
                    'name' => $value
                ]
            );
        }
    }
}
