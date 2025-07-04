<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
     protected $fillable = ['country_name', 'region_id'];

    // Relation avec la région
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
