<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ruc', 'state'];

    public function purchase(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function purchase_details(): HasManyThrough
    {
        return $this->hasManyThrough(Purchase_Detail::class, Purchase::class);
    }
}
