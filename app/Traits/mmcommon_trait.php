<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

//This trait some magic methods default instruction for various classes
trait MmCommonTrait{

    public function __call($name, $arguments)
    {
        $class_name = get_class($this);
        Log::channel('stdout')->error("Il metodo {$name} non esiste in {$class_name}");
    }

    public function __callStatic($name, $arguments)
    {
        $class_name = get_called_class();
        Log::channel('stdout')->error("Il metodo statico {$name} non esiste nella classe {$class_name}");
    }

    public function __get($name)
    {
        $class_name = get_class($this);
        Log::channel('stdout')->error("La proprietà {$name} non esiste in {$class_name}");
    }

    public function __toString()
    {
        $class_name = get_class($this);
        $string = "Oggetto di tipo {$class_name}";
        return $string;
    }

}
?>