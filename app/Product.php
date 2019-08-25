<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = ['tags','images','filepath'];


    public function cate()
    {
        return $this->belongsTo(Cate::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity')->withTimestamps();
    }

    public function attachments()
    {
        return $this->hasMany(Photo::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
