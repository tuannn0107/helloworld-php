<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;

class ModuleGenerateCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Module';

    public function handle()
    {
        $this->call('make:model', ['name'=>'Models\\' . $this->getModuleName()]);
        $this->call('make:controller', ['name'=>$this->getModuleName()]);
        $this->call('make:requesttomodelconverter', ['name'=>$this->getModuleName()]);
        $this->call('make:service', ['name'=>$this->getModuleName()]);
        $this->call('make:repository', ['name'=>$this->getModuleName()]);
    }

    /**
     * @return array|string
     */
    private function getModuleName() {
        $module = $this->argument('name');
        Log::info($module);
        if(!$module){
            throw new InvalidArgumentException("Missing required argument module name");
        }
        return $module;
    }


    protected function getStub()
    {
        // TODO: Implement getStub() method.
    }
}
