@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<a class="btn btn-app bg-secondary" href="/classes">
  <i class="fas fa-arrow-left"></i>back
</a>
<h1>class/edit</h1>
@stop

@section('content')
<form action="{{ url('classes', $clazz->id) }}" method="post">
  @method('PUT')
  @csrf
  <div class="card">
    <div class="card-body p-0">
      <table class="table table-bordered table-striped">
        <thead>
          <th>id</th>
          <th>name</th>
          <th>year</th>
          <th>season</th>
          <th>type</th>
          <th>created_at</th>
          <th>updated_at</th>
        </thead>
        <tr>
          <td>{{ $clazz->id }}</td>
          <td>{{ $clazz->name }}</td>
          <td>{{ $clazz->year }}</td>
          <td>{{ $clazz->season }}</td>
          <td>{{ $clazz->type }}</td>
          <td>{{ $clazz->created_at }}</td>
          <td>{{ $clazz->updated_at }}</td>
        </tr>
        <tr>
          <td></td>
          <td><input type="text" class="form-control" name="name" value="{{ $clazz->name }}"></td>
          <td><input type="text" class="form-control" name="year" value="{{ $clazz->year }}"></td>
          <td><input type="text" class="form-control" name="season" value="{{ $clazz->season }}"></td>
          <td><input type="text" class="form-control" name="type" value="{{ $clazz->type }}"></td>
          <td></td>
          <td></td>
        </tr>
      </table>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">update</button>
</form>
<form id="commonForm">
  @csrf
</form>
@stop

@section('js')
<script>
</script>
@stop
