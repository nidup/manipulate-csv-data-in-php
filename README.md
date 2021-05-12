# Manipulate CSV Data in PHP

Tutorial and examples on How to Manipulate CSV Files in PHP.

## Installation

Download the source code:

```
git clone git@github.com:nidup/manipulate-csv-data-in-php.git
cd manipulate-csv-data-in-php
```

Then the installation comes into 2 flavor, directly on your host or using docker.

Once installed the commands are the same, some docker shortcuts are provided in `.docker/bin`. 

### Install directly on your system (option A)

Install the PHP dependencies: 

```
composer install
```

### Install with docker & docker-compose (option B)

Build the docker image and install the PHP dependencies:

```
docker-compose up -d 
./docker/bin/composer install
```

### Test the console

List the commands (Option A):
```
bin/console
```

List the commands (Option B):
```
.docker/bin/console
```

