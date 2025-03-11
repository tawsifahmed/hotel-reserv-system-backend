<?php

namespace App\Traits;

use DateTime;

trait DateTimeFormater
{
    public function dateTimeFormater($date)
    {
        $date = str_replace("\u{A0}", " ", $date);

        $dateTime = new DateTime($date);
        $formattedDate = $dateTime->format('Y-m-d');
        return $formattedDate;
    }
}
