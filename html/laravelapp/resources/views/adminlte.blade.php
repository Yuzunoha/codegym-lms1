@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>ダッシュボード</h1>
@stop

@section('content')
<p>ここがコンテンツ部分です</p>

<table>
  <tr>
    <th>1</th>
    <th>2</th>
    <th>3</th>
  </tr>
  <tr>
    <td>a</td>
    <td>b</td>
    <td>b</td>
  </tr>
</table>
@stop

@section('css')
{{-- ページごとCSSの指定
    <link rel="stylesheet" href="/css/xxx.css">
    --}}
@stop

@section('js')
<script>
  console.log('ページごとJSの記述');
</script>
@stop
