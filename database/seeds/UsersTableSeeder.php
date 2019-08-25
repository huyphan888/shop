<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'huy',
            "email" => 'huy@gmail.com',
            "password" => bcrypt('1'),
            'role_id'=>1,
            'isActive'=>1,

        ]);

        factory(User::class, 9)->create();

    }
}
