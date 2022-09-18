<?php

namespace MicroMatt27170\CrudModelHelper\Commands;

use Illuminate\Console\Command;

class CrudModelHelperCommand extends Command
{
    public $signature = 'crud-model-helper';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
