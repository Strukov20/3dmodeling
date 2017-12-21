<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmUser extends Model
{

    protected $table = 'confirmations';

    protected $fillable = [
        'email',
        'token',
    ];

}
