<?php

namespace m1n0;

class JSONRotatorIterative implements JSONRotatorInterface
{
  /**
   * Rotate array.
   *
   * @param $data
   * @return array
   */
  public function rotate($data)
  {
    return $this->transpose($data);
  }

  /**
   * Simple array transpose.
   *
   * @param $arr
   * @return array
   */
  private function transpose($arr) {
    $out = array();
    foreach ($arr as $key => $subarr) {
      foreach ($subarr as $subkey => $subvalue) {
        $out[$subkey][$key] = $subvalue;
      }
    }
    return $out;
  }


}
