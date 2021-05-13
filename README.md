# Manipulate CSV Data in PHP 🐘

Tutorial and examples on How to Manipulate CSV Files in PHP.

## Installation 📦

Download the source code:

```
git clone git@github.com:nidup/manipulate-csv-data-in-php.git
cd manipulate-csv-data-in-php
```

Then the installation comes into 2 flavors, directly on your host or using docker.

Once installed the commands are the same, some docker shortcuts are provided in `.docker/bin`. 

### Install directly on your system (option A) 💻

Install the PHP dependencies: 

```
composer install
```

### Install with docker & docker-compose (option B) 🐋

Build the docker image and install the PHP dependencies:

```
docker-compose up -d 
.docker/bin/composer install
```

## Use the console commands 🚀

Use `bin/console` or `.docker/bin/console` to launch a command.

List the commands:
```
bin/console
[...]
nidup:csv-league:read-big-csv-file  Read a big csv file (with league csv) and measure time and memory usage
nidup:csv-league:read-csv-file      Read a csv file (with league csv)
nidup:csv-league:write-csv-file     Write a csv file (with league csv)
nidup:csv-native:read-csv-file      Read a csv file (with native functions)
nidup:csv-native:write-csv-file     Write a csv file (with native functions)
[...]
```

Launch a command:
```
bin/console nidup:csv-league:read-csv-file --env=prod
```
