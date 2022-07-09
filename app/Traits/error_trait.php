<?php

namespace App\Traits;

trait ErrorTrait{

    private int $errno = 0;
    private ?string $error = null;

    public function getErrno(){return $this->errno;}
}

?>