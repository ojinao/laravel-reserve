@extends('layouts.login')
@section('content')

<div class="row justify-content-center">
  <div class="col-md-8" style="margin-top: 100px;">
    <div class="general">
      <a class="btn btn-outline-secondary" href="/general">当月へ</a>
      <div class="title">
        <div class = "month">< 前の月</div>
        <div class = "getTitle">{{ $calendar->getTitle() }}</div>
        <div class = "month">次の月 ></div>
      </div>
        <div class="">
          {!! $calendar->render() !!}
        </div>
      </div>
    </div>
  </div>

  @endsection