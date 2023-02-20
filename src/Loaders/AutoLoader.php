<?php

declare(strict_types=1);

namespace Src\Loaders;

trait AutoLoader
{
    use ObserverLoaderTrait;
    use ModelLoaderTrait;

    /**
     * Register method service provider
     *
     * @return void
     */
    public function runLoaderRegister(): void
    {
        // @TODO Register provider
    }//end runLoaderRegister()

    /**
     * Boot method service provider
     *
     * @return void
     */
    public function runLoaderBoot(): void
    {
        $this->loadMaps();
        $this->loadObservers();
    }//end runLoaderBoot()
}
