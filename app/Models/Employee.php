<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Employee\Status;
use App\Traits\RoleTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Authenticatable
{
    use HasFactory , HasRoles , RoleTrait;

    protected $fillable = [
        'username',
        'email',
        'password',
        'adress',
        'phone',
        'domain_id',
        'resume',
    ];

    protected $casts = [
        'domain_id' => 'integer',
        'password' => 'hashed',
    ];

    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }

    public function scopeByStatus($query){

        return $query->where('status' ,2);
        
    }

    public function interventions(): BelongsToMany
    {
        return $this->belongsToMany(Intervention::class)
                    ->withPivot(['employee_status']);
    }
}
