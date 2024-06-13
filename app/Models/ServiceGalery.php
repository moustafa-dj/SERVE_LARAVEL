<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceGalery extends Model
{
    use HasFactory;

    protected  $fillable = [
        'img',
        'service_id'
    ];

    protected $casts = [
        'service_id' => 'integer'
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(service::class);
    }


}
