<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    protected $model = Request::class;

    public function definition()
    {
        return [
            'user_id' => User::query()->get('id')->random(),
            'inventory_id' => Inventory::query()->get('id')->random(),
            'quantity' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement(["ACTIVE", "PENDING", "DECLINED", "LATE", "ACCEPTED", "RETURNED"])
        ];
    }
}
