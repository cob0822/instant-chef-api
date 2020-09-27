<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * @return BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * @param Builder $builder
     * @param string $keyword
     */
    public function scopeMatchWithKeyword(Builder $builder, string $keyword)
    {
        return $builder->where('name', 'like', "%$keyword%");
    }
}
