<?php

use App\Cate;
use Illuminate\Database\Seeder;

class CatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cate::create(
            [
                'id'=>1,
                'name' => 'Smartphone',
                'slug' => str_slug('Smartphone'),
                "parent_id" => 0,
            ]);
        Cate::create([
            'id'=>2,
            'name' => 'Laptop',
            'slug' => str_slug('Laptop'),
            "parent_id" => 0
        ]);
        Cate::create([
            'id'=>3,
            'name' => 'iPhone',
            'slug' => str_slug('iphone'),
            "parent_id" => 1
        ]);
        Cate::create([
            'id'=>6,
            'name' => 'Samsung',
            'slug' => str_slug('samsung'),
            "parent_id" => 1
        ]);
        Cate::create([
            'id'=>4,
            'name' => 'Macbook',
            'slug' => str_slug('Macbook'),
            "parent_id" => 2
        ]);
        Cate::create([
            'id'=>7,
            'name' => 'Dell',
            'slug' => str_slug('dell'),
            "parent_id" => 2
        ]);
        Cate::create([
            'id'=>5,
            'name' => 'Accessories',
            'slug' => str_slug('accessories'),
            "parent_id" => 0
        ]);
        Cate::create([
            'id'=>8,
            'name' => 'Headphone',
            'slug' => str_slug('headphone'),
            "parent_id" => 5
        ]);
        Cate::create([
            'id'=>9,
            'name' => 'Watch',
            'slug' => str_slug('watch'),
            "parent_id" => 0
        ]);




    }
}
