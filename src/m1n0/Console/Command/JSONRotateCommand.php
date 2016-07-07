<?php

namespace m1n0\Console\Command;

use m1n0\JSONRotatorInterface;
use m1n0\JSONRotatorIterative;
use m1n0\JSONRotatorRecursive;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class JSONRotateCommand extends Command {
  private $dataShort;
  private $dataLong;

  /** @var JSONRotatorIterative  */
  private $iterativeRotator;
  /** @var  JSONRotatorRecursive */
  private $recursiveRotator;

  public function __construct($iterativeRotator, $recursiveRotator, $data) {
    $this->iterativeRotator = $iterativeRotator;
    $this->recursiveRotator = $recursiveRotator;
    $this->dataLong = $data;
    $this->dataShort = array_slice($data, 0, 10);

    parent::__construct();
  }


  protected function configure() {
    $this
      ->setName('m1n0:JSONRotate')
      ->setDescription('Run JSON rotating test on console')
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    echo "Running with 10 records:\n\r";
    $runShortOriginal = $this->rotate($this->iterativeRotator, $this->dataShort, FALSE);
    $runShortTransposed = $this->rotate($this->iterativeRotator, $this->dataShort, TRUE, $runShortOriginal);
    echo "Recursive transpose (keys are not preserved, comparing to no-transpose run):\n\r";
    $runShortTransposedRecursive = $this->rotate($this->recursiveRotator, $this->dataShort, TRUE, $runShortOriginal);

    echo "Running with 1000 records:\n\r";
    $runLongOriginal = $this->rotate($this->iterativeRotator, $this->dataLong, FALSE);
    $runLongTransposed = $this->rotate($this->iterativeRotator, $this->dataLong, TRUE, $runLongOriginal);
    echo "Recursive transpose (keys are not preserved, comparing to no-transpose run):\n\r";
    $runLongTransposed = $this->rotate($this->recursiveRotator, $this->dataLong, TRUE, $runLongOriginal);
  }


    private function rotate(JSONRotatorInterface $rotator, $data, $rotate, $previous_run = []) {
    if ($rotate) {
      echo "--- Encoding to JSON transposed: ---\r\n";
    }
    else {
      echo "--- Encoding to JSON as-is: ---\r\n";
    }

    $start = microtime(true);

    if ($rotate) {
      $json = json_encode($rotator->rotate($data));
    }
    else {
      $json = json_encode($data);
    }

    $time_elapsed = microtime(true) - $start ;
    $size = mb_strlen($json);
    $size_gzipped = mb_strlen(gzcompress($json));
    echo 'Time elapsed: ' . $time_elapsed . " s\r\n";
    echo 'JSON size: ' . $size . " B\r\n";
    echo 'JSON gzipped size: ' . $size_gzipped . " B\r\n";

    if (!empty($previous_run)) {
      echo "\r\nPrevious run comparison:\r\n";
      echo 'Time: ' . $time_elapsed / $previous_run['time_elapsed'] . "\r\n";
      echo 'Size: ' . $size / $previous_run['size'] . "\r\n";
      echo 'Gzipped size: ' . $size_gzipped / $previous_run['size_gzipped'] . "\r\n";
    }

    echo "\r\n\r\n";

    return [
      'time_elapsed' => $time_elapsed,
      'size' => $size,
      'size_gzipped' => $size_gzipped,
    ];
  }
}
