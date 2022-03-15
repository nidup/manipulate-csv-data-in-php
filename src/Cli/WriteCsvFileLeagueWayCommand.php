<?php

declare(strict_types=1);

namespace App\Cli;

use League\Csv\Writer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WriteCsvFileLeagueWayCommand extends Command
{
    protected function configure()
    {
        $this->setName('nidup:csv-league:write-csv-file')
            ->setDescription('Write a csv file (with league csv)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // insert / erase the file
        if (false) {
            $rows = [
                ['id', 'title', 'poster', 'overview', 'release_date', 'genres'],
                [181808, "Star Wars: The Last Jedi", "https://image.tmdb.org/t/p/w500/kOVEVeg59E0wsnXmF9nrh6OmWII.jpg", "Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares to do battle with the First Order.", 1513123200, "Documentary"],
                [383498, "Deadpool 2", "https://image.tmdb.org/t/p/w500/to0spRl1CMDvyUbOnbb4fTk3VAd.jpg", "Wisecracking mercenary Deadpool battles the evil and powerful Cable and other bad guys to save a boy's life.", 1526346000, "Action, Comedy, Adventure"],
                [157336, "Interstellar", "https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg", "Interstellar chronicles the adventures of a group of explorers who make use of a newly discovered wormhole to surpass the limitations on human space travel and conquer the vast distances involved in an interstellar voyage.",1415145600,"Adventure, Drama, Science Fiction"]
            ];

            $path = 'data/new-file2.csv';
            $csv = Writer::createFromPath($path, 'w');
            $csv->insertAll($rows);
            $output->writeln("I wrote the CSV File ".$path);
        }

        $appendRows = [
            [324857, "Spider-Man: Into the Spider-Verse", "https://image.tmdb.org/t/p/w500/iiZZdoQBEYBv6id8su7ImL0oCbD.jpg", "Miles Morales is juggling his life between being a high school student and being a spider-man. When Wilson 'Kingpin' Fisk uses a super collider, others from across the Spider-Verse are transported to this dimension.",1544140800,"Action, Adventure, Animation, Science Fiction, Comedy"],
            [456740, "Hellboy", "https://image.tmdb.org/t/p/w500/bk8LyaMqUtaQ9hUShuvFznQYQKR.jpg", "Hellboy comes to England, where he must defeat Nimue, Merlin's consort and the Blood Queen. But their battle will bring about the end of the world, a fate he desperately tries to turn away.",1554944400,"Fantasy, Action"]
        ];
        $path = 'data/new-file2.csv';
        $csv = Writer::createFromPath($path, 'a+');
        $csv->insertAll($appendRows);
        $output->writeln("I append lines in the CSV File ".$path);

        return 0;
    }
}
