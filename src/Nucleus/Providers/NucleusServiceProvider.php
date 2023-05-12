<?php

declare(strict_types=1);

namespace Nucleus\Providers;

use Illuminate\Support\Facades\Schema;
use Nucleus\Abstracts\Providers\MainServiceProvider as AbstractMainServiceProvider;
use Nucleus\Foundation\Apiato;
use Nucleus\Loaders\AutoLoaderTrait;
use Nucleus\Traits\ValidationTrait;
use Src\Providers\RedisProvider;

class NucleusServiceProvider extends AbstractMainServiceProvider
{
    use AutoLoaderTrait;
    use ValidationTrait;

    public function register(): void
    {
        // NOTE: function order of this calls bellow are important. Do not change it.

        $this->app->bind('Apiato', Apiato::class);
        // Register Core Facade Classes, should not be registered in the $aliases property, since they are used
        // by the auto-loading scripts, before the $aliases property is executed.
        $this->app->alias(Apiato::class, 'Apiato');

        $this->app->register(RedisProvider::class);

        // parent::register() should be called AFTER we bind 'Apiato'
        parent::register();

        $this->runLoaderRegister();
    }

    public function boot(): void
    {
        parent::boot();

        // Autoload most of the Containers and Ship Components
        $this->runLoadersBoot();

        // Solves the "specified key was too long" error, introduced in L5.4
        Schema::defaultStringLength(191);

        // Registering custom validation rules
        $this->extendValidationRules();
    }
}
