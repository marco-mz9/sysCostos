<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create()
 */
class Sale extends Model
{
    use HasFactory;

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
