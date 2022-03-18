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
        // read the file
        if (false) {
            $handle = fopen($path, "r");
            while (($row = fgetcsv($handle)) !== false) {
                var_dump($row);
            }
            fclose($handle);
        }

        // combine rows into an associative array
        // read the rows
        $rows = [];
        $handle = fopen($path, "r");
        while (($row = fgetcsv($handle)) !== false) {
            $rows[] = $row;
        }
        fclose($handle);
        // Remove the first one that contains headers
        $headers = array_shift($rows);
        // Combine the headers with each following row
        $array = [];
        foreach ($rows as $row) {
            $array[] = array_combine($headers, $row);
        }
        var_dump($array);

        $output->writeln("I read the CSV File ".$path);

        return 0;
    }
}
