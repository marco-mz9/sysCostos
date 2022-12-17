<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create()
 * @method static find(mixed $sale)
 */
class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
