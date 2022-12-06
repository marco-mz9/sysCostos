<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'state'];

    public function purchases_detail(): HasMany
    {
        return $this->hasMany(Purchase_Detail::class);
    }
}
