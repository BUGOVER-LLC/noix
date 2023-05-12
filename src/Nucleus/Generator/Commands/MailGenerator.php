<?php

namespace Nucleus\Generator\Commands;

use Illuminate\Support\Str;
use Nucleus\Generator\GeneratorCommand;
use Nucleus\Generator\Interfaces\ComponentsGenerator;
use Symfony\Component\Console\Input\InputOption;

class MailGenerator extends GeneratorCommand implements ComponentsGenerator
{
    /**
     * User required/optional inputs expected to be passed while calling the command.
     * This is a replacement of the `getArguments` function "which reads whenever it's called".
     *
     * @var  array
     */
    public array $inputs = [
        ['view', null, InputOption::VALUE_OPTIONAL, 'The name of the view (blade template) to be loaded.'],
    ];
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'apiato:generate:mail';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Mail class';
    /**
     * The type of class being generated.
     */
    protected string $fileType = 'Mail';
    /**
     * The structure of the file path.
     */
    protected string $pathStructure = '{section-name}/{container-name}/Mails/*';
    /**
     * The structure of the file name.
     */
    protected string $nameStructure = '{file-name}';
    /**
     * The name of the stub file.
     */
    protected string $stubName = 'mail.stub';

    public function getUserInputs(): ?array
    {
        $view = $this->checkParameterOrAsk('view', 'Enter the name of the view to be loaded when sending this Mail');

        return [
            'path-parameters' => [
                'section-name' => $this->sectionName,
                'container-name' => $this->containerName,
            ],
            'stub-parameters' => [
                '_section-name' => Str::lower($this->sectionName),
                'section-name' => $this->sectionName,
                'sectionName' => Str::camel($this->sectionName),
                '_container-name' => Str::lower($this->containerName),
                'container-name' => $this->containerName,
                'containerName' => Str::camel($this->containerName),
                'class-name' => $this->fileName,
                'view' => $view,
            ],
            'file-parameters' => [
                'file-name' => $this->fileName,
            ],
        ];
    }

    public function getDefaultFileName(): string
    {
        return 'DefaultMail';
    }
}
