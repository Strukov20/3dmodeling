<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';

    protected $fillable = [
        'title',
        'description',
        'body',
        'url',
        'image',
        'show'
    ];

    public function getTitle(){
        return $this->title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getBody(){
        return $this->body;
    }

    public function getUrl(){
        return $this->url;
    }

    public function getImage(){
        return asset('storage/' . $this->image);
    }

    public function isVisible(){
        return (boolean) $this->show;
    }

}
