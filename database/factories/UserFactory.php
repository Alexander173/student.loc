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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->defineAS(App\Student::class,function (Faker $faker){
    $faker=Faker\Factory::create('ru_RU');
    return[
            'first_name'=>$faker->firstName,
            'middle_name'=>$faker->lastName,
            'last_name'=>$faker->middleName,
            'date_of_birthday'=> $faker->dateTimeThisCentury->format('d-m-Y'),
            'group_id'=>$faker->numberBetween($min=1,$max=3),
    ];
});
$factory->defineAS(App\Group::class,function (Faker $faker){
    $faker=Faker\Factory::create('ru_RU');
    return[
            'group_name'=>$faker->,
            'description'=>$faker->lastName,
            
    ];
});