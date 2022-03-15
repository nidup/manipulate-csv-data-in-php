<?php

declare(strict_types=1);

namespace App\Cli;

use League\Csv\Reader;
use League\Csv\Statement;
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

        // read all lines
        if (false) {
            $csv = Reader::createFromPath($path, 'r');
            $csv->setHeaderOffset(0); // use the first line as header for rows
            $header = $csv->getHeader();
            var_dump($header);
            $rows = $csv->getRecords();
            foreach ($rows as $row) {
                var_dump($row);
            }

            $output->writeln("I read the CSV File ".$path);
        }

        // count
        if (false) {
            $csv = Reader::createFromPath($path, 'r');
            $csv->setHeaderOffset(0); // use the first line as header for rows
            var_dump($csv->count());
        }

        // headers
        if (false) {
            $csv = Reader::createFromPath($path, 'r');
            $csv->setHeaderOffset(0); // use the first line as header for rows
            $headers = $csv->getHeader();
            var_dump($headers);
        }

        // fetch a specific rows by its index
        if (false) {
            $csv = Reader::createFromPath($path, 'r');
            $csv->setHeaderOffset(0); // use the first line as header for rows
            var_dump($csv->fetchOne(10));
        }

        // fetch specific rows by its index
        if (false) {
            // fetch 3 rows starting from the 10th row
            $csv = Reader::createFromPath($path, 'r');
            $csv->setHeaderOffset(0);
            $stmt = Statement::create()
                ->offset(10)
                ->limit(3);
            $records = $stmt->process($csv);
            foreach ($records as $row) {
                var_dump($row);
            }
        }

        // filter rows
        if (false) {
            $csv = Reader::createFromPath($path, 'r');
            $csv->setHeaderOffset(0);
            $stmt = Statement::create()
                ->where(function($row) { return strpos($row['title'], 'Deadpool') !== false; });
            $records = $stmt->process($csv);
            foreach ($records as $row) {
                var_dump($row);
            }
        }

        // sort rows
        if (true) {
            $csv = Reader::createFromPath($path, 'r');
            $csv->setHeaderOffset(0);
            $stmt = Statement::create()
                ->orderBy(function($row1, $row2) { return strcmp($row1['title'], $row2['title']); })
                ->limit(5);
            $records = $stmt->process($csv);
            foreach ($records as $row) {
                var_dump($row);
            }
        }


        return 0;
    }
}
