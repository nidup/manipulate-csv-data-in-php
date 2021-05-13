<?php

declare(strict_types=1);

namespace App\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReadCsvFileNativeWayCommand extends Command
{
    protected function configure()
    {
        $this->setName('nidup:csv-native:read-csv-file')
            ->setDescription('Read a csv file (with native functions)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = 'data/movies-100.csv';
        if (($handle = fopen($path, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                var_dump($data);
            }
            fclose($handle);
        }

        $output->writeln("I read the CSV File ".$path);

        return 0;
    }
}
