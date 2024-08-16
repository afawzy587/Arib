<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'username' => $this->faker->name,
            'email'    => $this->faker->unique()->safeEmail,
            'phone'    => '011'.$this->faker->unique()->numerify('##########'),
            'password' => Hash::make('password'), // password
            'memberShip' => Str::random(10),
            'companyName' => $this->faker->realText('20'),
            'email_verified_at' => now(),
            'birthday' => now(),
        ];
    }
}
