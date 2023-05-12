<?php

namespace Nucleus\Abstracts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as LaravelEloquentModel;
use Nucleus\Traits\FactoryLocatorTrait;
use Nucleus\Traits\HashedRouteBindingTrait;
use Nucleus\Traits\HashIdTrait;
use Nucleus\Traits\HasResourceKeyTrait;

abstract class Model extends LaravelEloquentModel
{
    use HashIdTrait;
    use HashedRouteBindingTrait;
    use HasResourceKeyTrait;
    use FactoryLocatorTrait;
    use HasFactory;
}
