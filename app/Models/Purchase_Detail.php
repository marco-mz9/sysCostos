<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase_Detail extends Model
{
    use HasFactory;

    protected $fillable = ['purchase_id', 'detail_id', 'quantity', 'total_value', 'tax_id', 'total'];

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class);
    }

    public function tax(): BelongsTo
    {
        return $this->belongsTo(Tax::class);
    }

    public function detail(): BelongsTo
    {
        return $this->belongsTo(Detail::class);
    }

}
