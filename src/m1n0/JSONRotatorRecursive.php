<?php

namespace m1n0;

use function PeteMc\Transpose\transpose;

class JSONRotatorRecursive implements JSONRotatorInterface
{
  /**
   * Rotate array.
   *
   * Rotates array in a way that keys are not preserved.
   *
   * @see JSONRotatorRecursiveSpec
   *
   * @param $data
   * @return array
   */
  public function rotate($data)
  {
    return transpose($data);
  }
}
