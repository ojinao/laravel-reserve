<?php

namespace App\Calendar;

// 余白用日を出力するクラス

class CalendarWeekBlankDay extends CalendarWeekDay {

  function getClassName(){
    return "day-blank";
  }

  function render(){
    return '';
  }
}
