#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/../vendor/autoload.php';

use m1n0\Console\Command\JSONRotateCommand;
use Symfony\Component\Console\Application;
use m1n0\JSONRotatorIterative;
use m1n0\JSONRotatorRecursive;

$application = new Application();

$application->add(new JSONRotateCommand(
  new JSONRotatorIterative(),
  new JSONRotatorRecursive(),
  json_decode(file_get_contents(__DIR__ . '/../resources/MockData.json'), true)
));

$application->run();
