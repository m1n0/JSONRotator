<?php

use function PeteMc\Transpose\transpose;

class JSONRotator
{
    public function rotate($data)
    {
        return transpose($data);
    }
}
