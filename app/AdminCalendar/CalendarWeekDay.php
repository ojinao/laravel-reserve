<?php

// その日のカレンダーを出力する

namespace App\AdminCalendar;

use Carbon\Carbon;

class CalendarWeekDay {
  protected $carbon;

  function __construct($data)
  {
    $this->carbon = new Carbon($data);
  }

  // format()関数に「D」を指定すると「Sun」「Mon」などの曜日を省略形式で取得
  // 日曜日はday-sun、月曜日はday-mon
  function getClassName(){
    return "day-" . strtolower($this->carbon->format("D"));
  }

// format()関数に「j」を指定すると先頭にゼロをつけない日付けを取得

  function render(){
    return '<p class="day">' . $this->carbon->format("j"). '</p>';
  }
}