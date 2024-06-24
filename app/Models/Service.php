<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'domain_id'
    ];

    protected $casts = [
        'domain_id' => 'integer'
    ];

    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ServiceGalery::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

}
