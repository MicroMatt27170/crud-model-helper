<?php

namespace MicroMatt27170\CrudModelHelper;

use MicroMatt27170\CrudModelHelper\Commands\CrudModelHelperCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CrudModelHelperServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('crud-model-helper');
        //->hasConfigFile()
        //->hasViews()
        //->hasMigration('create_crud-model-helper_table')
        //->hasCommand(CrudModelHelperCommand::class);
    }
}
