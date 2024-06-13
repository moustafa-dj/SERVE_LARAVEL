<?php

namespace App\Models;

use App\Enums\Domain\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    protected $casts = [
        'status' =>Status::class
    ];

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
