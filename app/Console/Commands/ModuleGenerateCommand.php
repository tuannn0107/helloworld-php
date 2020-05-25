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
        $moduleName = $this->getModuleName();
        $this->call('make:model', ['name'=>'Models\\' . $moduleName, '-m'=>true]);
        $this->call('make:observer', ['name' => $moduleName, '--model' => 'Models\\' . $moduleName]);
        $this->call('make:controller', ['name' => $moduleName . 'Controller', '-r' => true, '--model' => 'Models\\' . $moduleName]);
        $this->call('make:request', ['name' => $moduleName . 'Request']);
        $this->call('make:rule', ['name' => $moduleName . 'Rule']);
        $this->call('make:requesttomodelconverter', ['name'=>$moduleName]);
        $this->call('make:service', ['name'=>$moduleName]);
        $this->call('make:repository', ['name'=>$moduleName]);
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
