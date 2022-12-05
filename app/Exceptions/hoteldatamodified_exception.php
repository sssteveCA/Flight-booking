<?php

namespace App\Exceptions;

use Exception;
use Throwable;

/**
 * Thrown when the data of the hotel price preview was changed before insert them in the database
 */
class HotelDataModifiedException extends Exception{

    public function __construct(string $message, int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message,$code,$previous);
    }

    public function __toString(): string
    {
        return __CLASS__.": [{$this->code}]: {$this->message}\n";
    }
}
?>