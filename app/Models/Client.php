<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ruc', 'state'];

    //Relación uno a muchos
    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
