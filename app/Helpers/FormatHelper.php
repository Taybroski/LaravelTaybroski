<?php

namespace App\Helpers;

use Carbon\Carbon;

class FormatHelper {

  public static function formatPostDate($value)
  {
  //   $month = Carbon::createFromFormat($value, 'dS F Y')->toDateTimeString();
  //   $day   = Carbon::createFromFormat($value, 'h:ia')->toDateTimeString();
  //   $value = $month." at ".$day;
    
    // return $value;
    
    return Carbon::createFromFormat($value, 'dS F Y')->toDateTimeString();

  }

}