<?php

declare(strict_types=1);

namespace App\Cli;

use League\Csv\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReadCsvFileLeagueWayCommand extends Command
{
    protected function configure()
    {
        $this->setName('nidup:csv-league:read-csv-file')
            ->setDescription('Read a csv file (with league csv)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = 'data/movies-100.csv';
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0); // use the first line as header for rows

        $header = $csv->getHeader();
        var_dump($header);

        $rows = $csv->getRecords();
        foreach ($rows as $row) {
            var_dump($row);
        }

        $output->writeln("I read the CSV File ".$path);

        return 0;
    }
}
