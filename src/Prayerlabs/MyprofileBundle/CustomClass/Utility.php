<?php
namespace Prayerlabs\MyprofileBundle\CustomClass;

class Utility
{
    public static function calculateDateDifference($date1, $date2)
    {
        $timestampForDate1 = strtotime($date1);
        $timestampForDate2 = strtotime($date2);
        
        $differenceBetweenTimestamp = $timestampForDate1 - $timestampForDate2;
        //echo $differenceBetweenTimestamp/(24*60*60);
        $oneYear   = (24*60*60)*365;
        $oneMonth  = (24*60*60)*30;
        $oneWeek   = (24*60*60)*7;
        $oneDay    = (24*60*60);
        $oneHour   = (60*60);
        $oneMinute = 60;
        $dateDifferenceString = "";
        // First find if years , 1 Year  = (24*60*60)*365
        if($differenceBetweenTimestamp >= $oneYear)
        {
            $dateDifferenceString .= floor($differenceBetweenTimestamp / $oneYear)." Year";    
        }
        else if($differenceBetweenTimestamp >= $oneMonth)
             {
                 $dateDifferenceString .= floor($differenceBetweenTimestamp / $oneMonth)." Month";
             }
       else if($differenceBetweenTimestamp >= $oneWeek)
             {
                 $dateDifferenceString .= floor($differenceBetweenTimestamp / $oneWeek)." Week";
             }
       else if($differenceBetweenTimestamp >= $oneDay)
             {
                 $dateDifferenceString .= floor($differenceBetweenTimestamp / $oneDay)." Day";
             }
       else if($differenceBetweenTimestamp >= $oneHour)
             {
                 $dateDifferenceString .= floor($differenceBetweenTimestamp / $oneHour)." Hour";
             } 
       else if($differenceBetweenTimestamp >= $oneMinute)
             {
                 $dateDifferenceString .= floor($differenceBetweenTimestamp / $oneMinute)." Minute";
             } 
       else 
             {
                 $dateDifferenceString .= $differenceBetweenTimestamp." Seconds";
             } 
      return $dateDifferenceString;
    }
    
}
?>
