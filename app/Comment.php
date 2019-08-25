<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model


{
    protected $guarded = ['score'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
