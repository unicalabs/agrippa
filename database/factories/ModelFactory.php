<?php

use Carbon\Carbon;
use Rhumsaa\Uuid\Uuid;

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

$factory->define(App\Secret::class, function ($faker) {
    return [
        'secret' => Crypt::encrypt($faker->word(32)),
        'uuid4' => Hash::make(Uuid::uuid4()),
        'created_at' => Carbon::now(),
        'expires_at' => $faker->dateTimeBetween('+5 minutes', '+5 days'),
        'expires_views' => $faker->numberBetween(5,1000),
        'count_views' => 0
    ];
});
