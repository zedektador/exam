<?php

/*
  |--------------------------------------------------------------------------
  | Model Factories
  |--------------------------------------------------------------------------
  |
  | Here you may define all of your model factories. Model factories give
  | you a convenient way to create models for testing and seeding your
  | database. Just tell the factory how a default model should look.
  |
 */

$factory->define(App\Models\Promotion::class, function (Faker\Generator $faker) {
    return [
        'uuid' => $faker->uuid,
        'client_slug' => $faker->uuid,
        'required_fields' => ["mobile_number", "email_address", "full_name"],
        'mechanics_type' => $faker->randomElement(['winning','chance']),
        'time' => "10:00",
        'probability' => 5, // probability every 5 entries
    ];
});
