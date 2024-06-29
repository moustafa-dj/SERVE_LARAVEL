<?php

namespace App\Models;

use App\Enums\Intervention\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Intervention extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'status'
    ];

    protected $casts = [
        'order_id'=>'integer',
        'status' => Status::class
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class);
    }
}
