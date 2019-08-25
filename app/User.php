<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;



    protected $guarded = ['password_confirmation'];



    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }



    public function isAdmin()
    {
        if($this->role->name=='admin' && $this->isActive){
            return true;
        }
        return false;
    }

}
