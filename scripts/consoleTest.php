<?php

include __DIR__ . '/../src/JSONRotator.php';
include __DIR__ . '/../resources/data.php';

$rotator = new JSONRotator();


test($rotator, $data, FALSE);

echo "\r\nCleaning up...\r\n\r\n";
unset($start);
unset($json);
unset($time_elapsed);

test($rotator, $data, TRUE);


function test($rotator, $data, $rotate) {
  if ($rotate) {
    echo "Encoding to JSON transposed:\r\n";
  }
  else {
    echo "Encoding to JSON as-is:\r\n";
  }

  $start = microtime(true);
  $json = json_encode($rotator->rotate($data));
  $time_elapsed = microtime(true) - $start ;
  echo 'Time elapsed: ' . $time_elapsed . " s\r\n";
  echo 'JSON size: ' . mb_strlen($json) . " B\r\n";
}
