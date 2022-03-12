<?php

declare(strict_types=1);

namespace App\Cli;

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use League\Csv\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Stopwatch\Stopwatch;

class GenerateBigExcelFileSpoutWayCommand extends Command
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
        $this->setName('nidup:excel-spout:generate-big-excel-file')
            ->setDescription('Generate a 1M lines excel file (with box/spout)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // read 10k line in CSV from source
        $path = 'data/movies-10000.csv';
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);
        $rows = $csv->getRecords();
        // Generate 1M lines
        $pathBig = 'data/movies-1000000.xlsx';
        $writer = WriterEntityFactory::createXLSXWriter();
        $writer->openToFile($pathBig);
        for ($idx = 0; $idx < 100; $idx++) {
            foreach ($rows as $row) {
                $rowFromValues = WriterEntityFactory::createRowFromArray($row);
                $writer->addRow($rowFromValues);
            }
        }
        $writer->close();
        $output->writeln("I generate 1M rows in the Excel File ".$pathBig);

        return 0;
    }
}
