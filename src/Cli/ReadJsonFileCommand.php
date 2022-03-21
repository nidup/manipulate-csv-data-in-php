<?php

declare(strict_types=1);

namespace App\Cli;

use League\Csv\Writer;
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
        if (false) {
            $path = 'data/movies-10.json';
            // read the file's content as a string
            $jsonString = file_get_contents($path);
            // convert the json string to an array
            $jsonData = json_decode($jsonString, true);
            var_dump($jsonData);
        }

        // convert JSON to CSV file
        if (false) {
            $path = 'data/movies-flat-10.json';
            // read the file's content as a string
            $jsonString = file_get_contents($path);
            // convert the json string to an array of associative array (one per object)
            $jsonObjects = json_decode($jsonString, true);

            // fetch the keys of the first json object
            $headers = array_keys(current($jsonObjects));

            // flatten the json objects to keep only the values as arrays
            $rows = [];
            foreach ($jsonObjects as $jsonObject) {
                $rows[] = array_values($jsonObject);
            }

            // insert the headers and the rows in the CSV file
            $path = 'data/new-file2.csv';
            $csv = Writer::createFromPath($path, 'w');
            $csv->insertOne($headers);
            $csv->insertAll($rows);
        }


        return 0;
    }
}
