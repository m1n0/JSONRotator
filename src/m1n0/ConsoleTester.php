<?php

namespace m1n0;

class ConsoleTester {
  function run(JSONRotatorInterface $rotator, $data, $rotate, $previous_run = []) {
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
