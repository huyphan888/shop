<?php

use App\User;
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
//seed user
$factory->define(User::class, function (Faker $faker) {
    return array(
        'name' => $faker->firstName,
        'email' => $faker->unique()->email,
        'password' => bcrypt(1), // password
        'role_id'=>2
    );
});

//seed tag
$factory->define(\App\Tag::class, function (Faker $faker) {
    $name = $faker->name;
    return array(
        'name' => $name,
        'slug' =>Str::slug($name),
    );
});
$factory->define(\App\Order::class, function (Faker $faker) {
    return array(
        'name'=>$faker->name,
        'address' => $faker->address,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'user_id'=>rand(1,10)

    );
});
$factory->define(\App\Product::class, function (Faker $faker) {
    return array(
        'name' => $faker->firstName,
        'code' => strtoupper(Str::random(5)),
        'content'=>$faker->text,
        'original_price' => rand(200,1000)*1000,
        'sale_price' => rand(50,199)*1000,
        'quantity' => rand(1, 10),
        'user_id' => rand(1, 10),
        'cate_id' => rand(1,5),
        'featured'=>rand(0,1)


    );
});
