<?php

declare(strict_types=1);

namespace App\Cli;

use League\Csv\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReadJsonFileCommand extends Command
{
    protected function configure()
    {
        $this->setName('nidup:json:read-json-file')
            ->setDescription('Read a JSON file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = 'data/movies-10.json';
        // read the file's content as a string
        $jsonString = file_get_contents($path);
        // convert the json string to an array
        $jsonData = json_decode($jsonString, true);
        var_dump($jsonData);

        return 0;
    }
}
