<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		App\Product::truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        factory(Product::class, 15)->create()->each(function ($product) {
            for ($i = 1;$i<=rand(1,3);$i++) {
                if($i==1){
                    $tag[] = rand(1, 7); //>15
                }
                if($i==2){
                    $tag[] = rand(8,12);
                }
                if($i==3){
                    $tag[] = rand(13,15);
                }
            }
            $product->tags()->attach($tag);
        });
    }
}
