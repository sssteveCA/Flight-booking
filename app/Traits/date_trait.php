<?php

namespace App\Traits;

use DateTimeImmutable;

/**
 * This trait contains date functions
 */
trait DateTrait{

    /**
     * Check if date1 is greater at least 1 day than date2
     * @param string $date1
     * @param string $date2
     * @return bool true if $date1 is greater at least one day than $date2
     */
    private function oneDayDifference(string $date1, string $date2): bool{
        $oneDayGt = false;
        $date1_dt = DateTimeImmutable::createFromFormat('Y-m-d',$date1);
        $date2_dt = DateTimeImmutable::createFromFormat('Y-m-d',$date2);
        $diff = $date1_dt->diff($date2_dt);
        //Log::channel('stdout')->info('diff => '.var_export($diff,true));
        if($diff->invert == 1 && $diff->d >= 1){
            $oneDayGt = true;
        }
        return $oneDayGt;
    }
}
?>