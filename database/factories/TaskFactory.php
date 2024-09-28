<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\User;
use App\Models\Company;


class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(), 
            'description' => $this->faker->paragraph(), 
            'is_completed' => $this->faker->boolean(), 
            'start_at' => $this->faker->dateTimeBetween('-1 week', 'now'), 
            'expired_at' => $this->faker->dateTimeBetween('now', '+1 month'), 
            'user_id' => User::factory(),
            'company_id' => Company::factory(), 
        ];
    }
}
