<?php
// Controllerで作るとControllerのコードが長くなり、メンテナンス性が下がる。

// PHPでテンプレートを作るとbladeテンプレートとPHPのコードが混ざることでの煩雑さが発生

// シンプルに解決するため、このような時は「カレンダーを出力するためのクラス」を作成するというアプローチ

namespace App\AdminCalendar; //設置場所がapp/Calendarなので

use Carbon\Carbon;

Class CalendarView {
  private $carbon; //そのクラス自身のみがアクセス可能

  function __construct($data)
  {
    $this->carbon = new Carbon($data);
  }

  /**
   * 年日
   * @return void
   */
  public function getTitle(){
    return $this->carbon->format('Y年n日');
  }

  /**
   *カレンダーを出力する
   * @return void
   */
  function render(){
    $html = [];
    $html[] = '<div class="calender">';
    $html[] = '<table class="table">';
    $html[] = '<thead>';
    $html[] = '<tr>';
    $html[] = '<th>月</th>';
    $html[] = '<th>火</th>';
    $html[] = '<th>水</th>';
    $html[] = '<th>木</th>';
    $html[] = '<th>金</th>';
    $html[] = '<th>土</th>';
    $html[] = '<th>日</th>';
    $html[] = '</tr>';
    $html[] = '</thead>';
    // 下記週カレンダーの組み込みのコード
    $html[] = '<tbody>';

    $weeks = $this->getWeeks();
    foreach ($weeks as $week) {
      $html[] = '<tr class="' . $week->getClassName() . '">';
      $days = $week->getDays();
      foreach ($days as $day) {
        $html[] = '<td class="' . $day->getClassName() . '">';
        $html[] = $day->render();
        $html[] = '</td>';
      }
      $html[] = '</tr>';
    }
    $html[] = '</tbody>';
    // ここまで

    $html[] = '</table>';
    $html[] = '</div>';
    return implode("", $html);
  }

  protected function getWeeks(){
    $week = [];
    // 初月
    $firstDay = $this->carbon->copy()->firstOfMonth();
    // 月末まで
    $lastDay = $this->carbon->copy()->lastOfMonth();
    // 1週目
    $week = new CalendarWeek($firstDay->copy());
    $weeks[] = $week;
    //作業用の日
    $tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();
    //月末までループさせる
    while ($tmpDay->lte($lastDay)) {
      //週カレンダーViewを作成する
      $week = new CalendarWeek($tmpDay, count($weeks));
      $weeks[] = $week;
      //次の週=+7日する
      $tmpDay->addDay(7);
    }

    return $weeks;
  }
}