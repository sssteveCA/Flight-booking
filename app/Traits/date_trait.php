<?php

namespace App\Traits;

use DateTimeImmutable;
use Illuminate\Support\Facades\Log;

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
        $date1_dt = DateTimeImmutable::createFromFormat('Y-m-d',$date1);
        $date2_dt = DateTimeImmutable::createFromFormat('Y-m-d',$date2);
        $diff = $date1_dt->diff($date2_dt);
        if($diff->invert == 1 && $diff->d >= 1)
            return true;
        return false;
    }

    /**
     * Calculate the days of difference between two dates
     * @param string $date1
     * @param string $date2
     * @return int number of days difference between dates
     */
    private function dateDaysDifference(string $date1, string $date2): int{
        $date1_dt = DateTimeImmutable::createFromFormat('Y-m-d',$date1);
        $date2_dt = DateTimeImmutable::createFromFormat('Y-m-d',$date2);
        $diff = $date1_dt->diff($date2_dt);
        return $diff->d;
    }

    /**
     * Convert a date string in d-m-Y H:i:s format
     * @param string $date the date to convert
     * @return the date converted
     */
    private function formatDate(string $date): string{
        $dti = new DateTimeImmutable($date);
        return $dti->format("d-m-Y H:i:s");
    }
}
?>