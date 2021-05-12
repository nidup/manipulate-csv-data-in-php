<?php

declare(strict_types=1);

namespace App\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WriteCsvFileOldWayCommand extends Command
{
    protected function configure()
    {
        $this->setName('nidup:csv-old-way:write-csv-file')
            ->setDescription('Write a csv file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $rows = [
            ['id', 'title', 'poster', 'overview', 'release_date', 'genres'],
            [181808, "Star Wars: The Last Jedi", "https://image.tmdb.org/t/p/w500/kOVEVeg59E0wsnXmF9nrh6OmWII.jpg", "Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares to do battle with the First Order.", 1513123200, "Documentary"],
            [383498, "Deadpool 2", "https://image.tmdb.org/t/p/w500/to0spRl1CMDvyUbOnbb4fTk3VAd.jpg", "Wisecracking mercenary Deadpool battles the evil and powerful Cable and other bad guys to save a boy's life.", 1526346000, "Action, Comedy, Adventure"],
            [157336, "Interstellar", "https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg", "Interstellar chronicles the adventures of a group of explorers who make use of a newly discovered wormhole to surpass the limitations on human space travel and conquer the vast distances involved in an interstellar voyage.",1415145600,"Adventure, Drama, Science Fiction"]
        ];

        $path = 'data/new-file.csv';
        $fp = fopen($path, 'w');
        foreach ($rows as $row) {
            fputcsv($fp, $row);
        }
        fclose($fp);

        $output->writeln("I wrote the CSV File ".$path);

        return 0;
    }
}
