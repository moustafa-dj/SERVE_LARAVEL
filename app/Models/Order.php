<?php

namespace App\Models;

use App\Enums\Order\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'location',
        'order_date',
        'service_id',
        'client_id'
    ];

    protected $casts = [
        'service_id' => 'integer',
        'client_id'=> 'integer',
        'status' => Status::class
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }


}
