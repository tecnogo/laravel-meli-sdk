<?php

namespace Tecnogo\LaravelMeliSdk\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class MeliSdkWarmupCacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'melisdk:warmup-cache {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Warmups the SDK\'s cache with the provided file';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = base_path($this->argument('file'));
        $entries = require $path;

        \MeliSdk::warmUp($entries);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['file', InputArgument::REQUIRED, 'Source file path'],
        ];
    }
}
