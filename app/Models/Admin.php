<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use  Notifiable , HasFactory;

    protected $fillable = [
        'name',
        'full_name',
        'adress',
        'phone',
        'email',
        'image',
        'about'
    ];
}
