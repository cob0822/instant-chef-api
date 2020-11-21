<?php

namespace App\Models;

// use App\Models\Order;
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
        return $this->belongsToMany(Order::class, 'order_category');
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
