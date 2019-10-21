<?php

/**
 * return datetime in desired fromet with apply timezone.
 *
 * @return datetime
 *
 * @parm $date,$formetIn,$formetOut,$timeZone
 */ 
function getDatetime($date,$formetIn,$formetOut,$timeZone = FALSE)
{
    $timezone = $timeZone ;
    if($timeZone === FALSE )
    {
        $timezone = \Auth::user()->timeZone['timeZone'] ;
    }
    //$date = \DateTime::createFromFormat($formetIn, $date)->format('Y-m-d H:i:s') ;
    //return  (new \DateTime( $date , new \DateTimeZone( $timezone )))->format($formetOut) ;
    $dateObj = \DateTime::createFromFormat($formetIn, $date) ;
    return $dateObj->setTimezone(new \DateTimeZone($timezone))->format($formetOut);


}

