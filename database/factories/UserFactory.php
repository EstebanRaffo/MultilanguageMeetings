<?php

use Faker\Generator as Faker;
use Faker\Provider\en_US\Address;
use Faker\Provider\Internet;
use Faker\Provider\Lorem;
use App\User;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'age' => $faker->numberBetween(1,40),
        'telephone' => '111111-1111',
        'country' => $faker->country,
        'website' => $faker->url,
        'message' => $faker->text($maxNbChars = 100),
        'sex' => 'M',
        'language' => 'English',
        'role_id' => '2',
        'province' => 'Buenos Aires',
        'photo' => 'Usuario.jpg'
    ];
});
