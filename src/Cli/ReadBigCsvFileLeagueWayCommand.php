<?php

declare(strict_types=1);

namespace App\Cli;

use League\Csv\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Stopwatch\Stopwatch;

class ReadBigCsvFileLeagueWayCommand extends Command
{
    /** @var Stopwatch */
    private $stopwatch;

    public function __construct(?string $name = null, Stopwatch $stopwatch)
    {
        parent::__construct($name);
        $this->stopwatch = $stopwatch;
    }

    protected function configure()
    {
        $this->setName('nidup:csv-league:read-big-csv-file')
            ->setDescription('Read a big csv file and measure time and memory (with league csv)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $section = 'read_csv_file';
        $this->stopwatch->start($section);
        $path = 'data/movies-10000.csv';
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);
        $rows = $csv->getRecords();
        foreach ($rows as $row) {
            // to nothing, but we want to browse each row
        }
        $this->stopwatch->stop($section);
        $output->writeln("I read ".$csv->count()." rows from the CSV File ".$path);
        $output->writeln((string) $this->stopwatch->getEvent($section));

        return 0;
    }
}
