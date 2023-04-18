<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

//This trait some magic methods default instruction for various classes
trait MmCommonTrait{

    public function __call($name, $arguments)
    {
        $class_name = get_class($this);
    }

    public static function __callStatic($name, $arguments)
    {
        $class_name = get_called_class();
    }

    public function __get($name)
    {
        $class_name = get_class($this);
    }

    public function __toString()
    {
        $class_name = get_class($this);
        $string = "Oggetto di tipo {$class_name}";
        return $string;
    }

}
?>