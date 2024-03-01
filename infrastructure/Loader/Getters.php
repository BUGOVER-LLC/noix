<?php

declare(strict_types=1);

namespace Infrastructure\Loader;

trait Getters
{
    /**
     * @var array
     */
    private array $models = [];

    /**
     * @var array
     */
    private array $observers = [];

    /**
     * @return array
     */
    public function getObservers(): array
    {
        if (!$this->observers) {
            $path = app_path('Observers');
            recursive_loader($path, $this->observers, true);
        }

        return $this->observers;
    }

    /**
     * @return array
     */
    private function getModels(): array
    {
        if (!$this->models) {
            $path = base_path('src/Models');
            recursive_loader($path, $this->models, true);
        }

        return $this->models;
    }
}