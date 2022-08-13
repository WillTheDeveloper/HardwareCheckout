<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    protected $model = Inventory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'quantity' => $this->faker->numberBetween(1, 15),
            'category_id' => Category::query()->get('id')->random(),
            'collect_location' => $this->faker->country
        ];
    }
}
