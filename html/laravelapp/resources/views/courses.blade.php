@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>コース</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body p-0">
    <table class="table table-striped">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Course</th>
          <th>name</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1.</td>
          <td>Update software</td>
          <td>
            <div class="progress progress-xs">
              <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
            </div>
          </td>
        </tr>
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
