<?php

namespace Connectpx\LaravelBuilder\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelBuilder extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelbuilder';
    }
}
