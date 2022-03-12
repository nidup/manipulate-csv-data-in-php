<?php

declare(strict_types=1);

namespace App\Cli;

use League\Csv\Reader;
use League\Csv\Writer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Stopwatch\Stopwatch;

class GenerateBigCsvFileLeagueWayCommand extends Command
{
    /** @var Stopwatch */
    private $stopwatch;

    public function __construct(Stopwatch $stopwatch)
    {
        parent::__construct();
        $this->stopwatch = $stopwatch;
    }

    protected function configure()
    {
        $this->setName('nidup:csv-league:generate-big-csv-file')
            ->setDescription('Generate a 1M lines csv file (with league csv)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // read 10k line in CSV
        $path = 'data/movies-10000.csv';
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);
        $rows = $csv->getRecords();
        // generate 1M lines
        $pathBig = 'data/movies-1000000.csv';
        $csvBig = Writer::createFromPath($pathBig, 'w');
        $csvBig->insertOne($csv->getHeader());
        for ($idx = 0; $idx < 100; $idx++) {
            $csvBig->insertAll($rows);
        }
        $output->writeln("I generate 1M rows in the CSV File ".$pathBig);

        return 0;
    }
}
