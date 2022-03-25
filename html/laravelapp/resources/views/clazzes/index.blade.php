@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>classes</h1>
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
        @foreach($clazzes as $clazz)
        <tr data-widget="expandable-table" aria-expanded="false">
          <td>{{ $clazz->id }}</td>
          <td>{{ $clazz->name }}</td>
          <td><button onclick="edit(event, <?= $clazz->id ?>)" type="button" class="btn btn-block btn-default">編集</button></td>
          <td><button onclick="destroy(event, <?= $clazz->id ?>)" type="button" class="btn btn-block btn-danger">削除</button></td>
        </tr>
        <tr class="expandable-body d-none">
          <td colspan="4" style="width: auto">
            <!-- <p>{！！ clazzStr ！！}</p> -->
            <p>ダミー</p>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<form id="formPost" method="POST">@csrf</form>
@stop

@section('js')
<script>
  const edit = (event, id) => {
    const form = document.createElement('form');
    form.action = `classes/${id}/edit`;
    document.body.appendChild(form);
    form.submit();
    event.stopPropagation();
  };
  const destroy = (event, id) => {
    const ret = confirm('削除します。よろしいですか。');
    if (ret) {
      const form = document.getElementById('formPost');
      form.action = `classes/${id}`;
      form.innerHTML += '<input type="hidden" name="_method" value="DELETE">';
      form.submit();
    }
    event.stopPropagation();
  };
</script>
@stop
