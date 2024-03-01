<?php

declare(strict_types=1);

namespace Infrastructure\Loader;

use Illuminate\Database\Eloquent\Relations\Relation;

trait ModelLoader
{
    use Getters;

    /**
     * @return void
     */
    protected function loadMaps(): void
    {
        $result = [];

        foreach ($this->getModels() as $model) {
            if (true === method_exists($model, 'getMap')) {
                $model_object = (new $model());
                if ($model_object->getMap()) {
                    $result[$model_object->getMap()] = $model;
                }
            }
        }

        Relation::morphMap($result);
    }
}