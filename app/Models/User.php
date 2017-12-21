<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'nickname',
        'validate',
        'avatar',
        'date_of_birth',
        'information'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function getName(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function getNickname(){
        return $this->nickname;
    }

    public function getAvatarUrl(){
        return asset("storage/$this->avatar");
    }

    public function getRole(){
        return $this->role;
    }

    public function getQuestions(){
        return $this->hasMany('Question' , 'user_id');
    }

}

