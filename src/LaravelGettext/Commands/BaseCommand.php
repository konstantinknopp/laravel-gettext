<?php

namespace Unikat\LaravelGettext\Commands;

use Illuminate\Console\Command;
use Unikat\LaravelGettext\FileSystem;
use Unikat\LaravelGettext\Config\ConfigManager;

class BaseCommand extends Command
{
    /**
     * Filesystem helper
     *
     * @var \Unikat\LaravelGettext\FileSystem
     */
    protected $fileSystem;

    /**
     * Package configuration data
     *
     * @var array
     */
    protected $configuration;

    /**
     * Prepares the package environment for gettext commands
     * 
     * @return void
     */
    protected function prepare()
    {
        $configManager = ConfigManager::create();
        
        $this->fileSystem = new FileSystem(
            $configManager->get(),
            app_path(),
            storage_path()
        );

        $this->configuration = $configManager->get();
    }
}
