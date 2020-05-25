<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class AdminGeneratorCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Admin CRUD';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $this->call('make:model', ['name' => 'Models\\' . $name, '-m' => false]);
        $this->call('make:observer', ['name' => $name, '--model' => 'Models\\' . $name]);
        $this->call('make:controller', ['name' => 'Admin\\' . $name . 'Controller', '-r' => true, '--model' => 'Models\\' . $name]);
        $this->call('make:request', ['name' => $name . 'Request']);
        $this->call('make:rule', ['name' => $name . 'Rule']);
    }

    /**
     * Get stub.
     *
     * @return string|void
     */
    protected function getStub()
    {
        //
    }
}
