<?php

namespace App\Models;

use App\Enums\Intervention\Status;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function scopeByEmployee(Builder $query, $employeeId)
    {
        return $query->whereHas('employees', function ($query) use ($employeeId) {
            $query->where('employee_id', $employeeId);
        });
    }

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class)->withPivot(['employee_status']);
    }

    public function equipments(): BelongsToMany
    {
        return $this->belongsToMany(Equipment::class);
    }


    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
