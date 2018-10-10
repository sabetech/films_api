<?php

use Faker\Generator as Faker;

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

$factory->define(App\Film::class, function (Faker $faker) {
	$faker->addProvider(new Bluemmb\Faker\PicsumPhotosProvider($faker));

    return [
        'name' => ($local_name = $faker->name),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'release_date' => $faker->unixTime($max = 'now'),
        'rating' => $faker->numberBetween(1,5),
        'ticket_price' => $faker->randomNumber(2),
        'country' => $faker->country(),
        'genre' => $faker->name,
        'photo' => $faker->imageUrl(100,100, false, true),
        'url_slug' => str_slug($local_name.' '.date("Y-m-d H-i-s"))

        
    ];
});
