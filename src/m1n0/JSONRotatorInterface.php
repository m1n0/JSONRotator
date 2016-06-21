<?php

namespace m1n0;

interface JSONRotatorInterface {
  /**
   * Rotate array.
   *
   * @param $data
   * @return array
   */
  public function rotate($data);
}
