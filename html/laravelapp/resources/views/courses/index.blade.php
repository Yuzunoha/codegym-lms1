@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>courses</h1>
@stop

@section('content')
<p>レコードをクリックすると開きます。</p>
<div class="card">
  <div class="card-body p-0">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th style="width: 1000px">name</th>
          <th style="width: 100px">action</th>
          <th style="width: 100px">danger</th>
        </tr>
      </thead>
      <tbody>
        @foreach($courses as $course)
        <?php
        $clazzStr = '';
        foreach ($course->clazzes as $clazz) {
          $clazzStr .= "$clazz->name<br>";
        }
        ?>
        <tr data-widget="expandable-table" aria-expanded="false">
          <td>{{ $course->id }}</td>
          <td>{{ $course->name }}</td>
          <td><button type="button" class="btn btn-block btn-default">編集</button></td>
          <td><button type="button" class="btn btn-block btn-danger">削除</button></td>
        </tr>
        <tr class="expandable-body d-none">
          <td colspan="4">
            <p>{!! $clazzStr !!}</p>
          </td>
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
