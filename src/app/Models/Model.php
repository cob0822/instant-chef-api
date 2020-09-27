<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * Class Model
 * @package App\Models
 *
 * @mixin Builder
 *
 * @method static with($relations)
 */
abstract class Model extends BaseModel
{
}
