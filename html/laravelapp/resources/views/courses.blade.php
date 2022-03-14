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
          <th>name</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $a)
        <tr>
          <td>{{ $a['id'] }}</td>
          <td>{{ $a['name'] }}</td>
          <td>編集</td>
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
