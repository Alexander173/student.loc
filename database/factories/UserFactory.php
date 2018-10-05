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
$factory->defineAS(App\Student::class,'assessment',function (Faker $faker){
    return[
            'first_name'=>$faker->firstName,
            'middle_name'=>$faker->lastName,
            'last_name'=>$faker->firstName,
            'date_of_birthday'=> $faker->dateTimeThisCentury->format('Y-m-d'),
            'group_id'=>$faker->randomElement(App\Group::pluck('id')->toArray()),
    ];
});
$factory->defineAS(App\Group::class,'assessment',function (Faker $faker){
    return[
            'group_name'=>$faker->unique()->randomElement($array=array('ITB','JSS','PHPUnit','PSS','JS','IBM','Apple','Samsung')),
            'description'=>$faker->text($maxNbChrars=50),
    ];
});
$factory->defineAs(App\Subject::class,'assessment',function(Faker $faker){
    return[
            'subject_name'=>$faker->unique()->randomElement($array=array('История', 'Русский язык','Математика')),
    ];
});
$factory->defineAs(App\Assessment::class,'assessment',function(Faker $faker){
    return[
            'student_id'=>$faker->randomElement(App\Student::pluck('id')->toArray()),
            'subject_id'=>$faker->randomElement(App\Subject::pluck('id')->toArray()),
            'assess'=>$faker->numberBetween($min=2,$max=5),
    ];
});
