<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'sale_id', 'date_start', 'date_end'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'total_price');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }

    public function purchase(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
