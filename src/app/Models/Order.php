<?php

namespace App\Models;

// use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'desired_date',
        'cooking_frequency',
        'desired_cooking_time',
    ];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'order_category');
    }

    /**
     * @return BelongsToMany
     */
    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'order_tool');
    }

    /**
     * @return BelongsToMany
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'order_ingredient');
    }
}
