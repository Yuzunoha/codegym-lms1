@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>courses</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body p-0">
    <table class="table table-striped">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>name</th>
          <th>clazzes</th>
          <th style="width: 100px">action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($courses as $course)
        <?php
        $clazzStr = '';
        foreach ($course->clazzes as $clazz) {
          $clazzStr .= $clazz->name . '<br>';
        }
        ?>
        <tr>
          <td>{{ $course->id }}</td>
          <td>{{ $course->name }}</td>
          <td>{!! $clazzStr !!}</td>
          <td><button type="button" class="btn btn-block btn-default">編集</button></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop

@section('js')
<script>
  console.log('ページごとJSの記述');
</script>
@stop
