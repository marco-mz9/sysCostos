<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static firstOrNew(array $array)
 */
class Detail extends Model
{
    use HasFactory;

    protected $fillable = ['detail', 'classification_id', 'unit_value'];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase_Detail::class);
    }

    public function classification(): BelongsTo
    {
        return $this->belongsTo(Classification::class);
    }
}
