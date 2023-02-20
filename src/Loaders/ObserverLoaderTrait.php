<?php

declare(strict_types=1);

namespace Src\Loaders;

use Illuminate\Support\Str;

trait ObserverLoaderTrait
{
    use Getters;

    /**
     * @return array
     */
    protected function loadObservers(): void
    {
        foreach ($this->getModels() as $model) {
            foreach ($this->getObservers() as $observer) {
                if ((Str::afterLast($model, '\\') . 'Observer') === (Str::afterLast($observer, '\\'))) {
                    $model::observe($observer);
                }
            }
        }
    }
}
