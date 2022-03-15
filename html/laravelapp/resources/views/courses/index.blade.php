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
        <th style="width: 10px">#</th>
        <th style="width: auto">name</th>
        <th style="width: 90px">action</th>
        <th style="width: 100px">danger</th>
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
          <td><button onclick="edit(event, 17)" type="button" class="btn btn-block btn-default">編集</button></td>
          <td><button type="button" class="btn btn-block btn-danger">削除</button></td>
        </tr>
        <tr class="expandable-body d-none">
          <td colspan="4" style="width: auto">
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
  const edit = (event, id) => {
    let s = '編集ページに飛びます。\n';
    s += 'id: ' + id + '\n';
    const ret = confirm(s);
    if (ret) {
      const form = document.createElement('form');
      form.action = `courses/${id}/edit`;
      form.method = 'GET';
      document.body.appendChild(form);
      form.submit();
    }
    event.stopPropagation();
  }
</script>
@stop
