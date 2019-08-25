<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    //
    public $guarded = ['_token'];
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
