<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendar\CalendarView;

class CalendarController extends Controller
{
    public function show(){
        $calendar = new CalendarView(time()); //現在時刻time()
        return view('reserve.general.calendar', ["calendar" =>$calendar]);
    }
}
