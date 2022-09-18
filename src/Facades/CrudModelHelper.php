<?php

namespace MicroMatt27170\CrudModelHelper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MicroMatt27170\CrudModelHelper\CrudModelHelper
 */
class CrudModelHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \MicroMatt27170\CrudModelHelper\CrudModelHelper::class;
    }
}
