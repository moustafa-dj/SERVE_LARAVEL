<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use  Notifiable , HasFactory , HasRoles;

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
