<?php

namespace App\UseCases\Order;

use App\Database\Commands\Save;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Tool;
use App\Models\Ingredient;
use Throwable;

class StoreUsecase
{
    /** @var save */
    private $save;

    /**
     * CreateUsecase constructor
     * @param Save $save
     */
    public function __construct(Save $save)
    {
        $this->save = $save;
    }

    /**
     * @param Request $request
     * @return OrderResource
     * @throws Throwable
     */
    public function invoke(Request $request)
    {
        $order = new Order([
            'user_id' => \Auth::user()->id,
            'name' => $request['name'],
            'description' => $request['description'],
            'desired_date' => $request['date'],
            'cooking_frequency' => $request['cooking_frequency'],
            'desired_cooking_time' => $request['creation_time'],
        ]);
        $order = $this->save->execute($order);

        if ($request['categories']) {
            foreach ($request['categories'] as $category) {
                $order->categories()->attach([
                    'category_id' => $category,
                ]);
            }
        }
        if ($request['tool']) {
            foreach ($request['tool'] as $tool) {
                $tool = Tool::updateOrCreate(
                    [
                        'name' => $tool,
                    ],
                    [
                        'name' => $tool,
                    ]
                );
                $order->tools()->attach([
                    'tool_id' => $tool->id,
                ]);
            };
        }
        if ($request['ingredients']) {
            foreach ($request['ingredients'] as $ingredient) {
                $ingredient = Ingredient::updateOrCreate(
                    [
                        'name' => $ingredient,
                    ],
                    [
                        'name' => $ingredient,
                    ]
                );
                $order->ingredients()->attach([
                    'ingredient_id' => $ingredient->id,
                ]);
            };
        }
        return new OrderResource($order);
    }
}
