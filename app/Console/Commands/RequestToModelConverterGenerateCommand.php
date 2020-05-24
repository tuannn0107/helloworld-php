<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;

class RequestToModelConverterGenerateCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:requesttomodelconverter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new converter which convert from the Request to Model';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Converter';

    /**
     * @var string
     */
    protected $defaultClassNameSuffix = 'ReqConverter';

    /**
     * @var string
     */
    protected $defaultClassNamePrefix = 'RequestTo';

    /**
     * @var string
     */
    protected $defaultFolderSuffix = 'Http\Controllers\converter\req';


    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return $this->defaultClassNamePrefix . trim($this->argument('name')) . $this->defaultClassNameSuffix;
    }


    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        if(!$this->argument('name')){
            throw new InvalidArgumentException("Missing required argument model name");
        }

        $stub = parent::replaceClass($stub, $name);

        return str_replace('DummyModel', $this->argument('name'), $stub);
    }

    /**
     *
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return  base_path('stubs/request.to.model.converter.stub');
    }
    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\' . $this->defaultFolderSuffix;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model class.'],
        ];
    }

    protected function getNamespace($name)
    {
        return parent::getNamespace($name);
    }
}
