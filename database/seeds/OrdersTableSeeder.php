<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 15)->create()->each(function ($order) {
            for ($i = 1;$i<=rand(1,3);$i++) {
                if($i==1){
                    $product[rand(1,7)] = ['quantity' => rand(1,10)];
                }
                if($i==2){
                    $product[rand(8,12)] = ['quantity' => rand(1,10)];

                }
                if($i==3){
                    $product[rand(13,15)] = ['quantity' => rand(1,10)];

                }
            };
            $order->products()->attach($product);
        });
    }
}
