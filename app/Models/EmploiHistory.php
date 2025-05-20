<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class EmploiHistory extends Model
{
    // protected $with =['user'];
    /**
     * 3-Les attributs pouvant être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'emploi_id',
        'start_date',
        'end_date',
    ];

/**
     * -Scope de filtrage.
     *
     * @param  Builder  $query
     * @param  Request  $request
     * @return Builder
     */
    public function scopeFilter(Builder $query, Request $request)
    {
        // 2-Filtrage par utilisateur
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->input('user_id'));
        }
    
        // 15-Filtrage par emploi
        if ($request->filled('emploi_id')) {
            $query->where('emploi_id', $request->input('emploi_id'));
        }
    
        // -Filtrage par dates (>= start_date, <= end_date)
        if ($request->filled('start_date')) {
            $query->whereDate('start_date', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
            $query->whereDate('end_date', '<=', $request->input('end_date'));
        }
    
        return $query;
    }
    /**
     * -Relation : un historique d'emploi appartient à un utilisateur.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 2-Relation : un historique d'emploi appartient à un emploi.
     */
    public function emploi(): BelongsTo
    {
        return $this->belongsTo(Emploi::class);
    }
}
