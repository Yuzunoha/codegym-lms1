@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>courses/edit</h1>
@stop

@section('content')
<form action="{{ url('courses', $course->id) }}" method="post">
  @method('PUT')
  @csrf
  <div class="card">
    <div class="card-body p-0">
      <table class="table table-bordered table-striped">
        <thead>
          <th>id</th>
          <th>name</th>
          <th>created_at</th>
          <th>updated_at</th>
          <th>deleted_at</th>
        </thead>
        <tr>
          <td>{{ $course->id }}</td>
          <td>{{ $course->name }}</td>
          <td>{{ $course->created_at }}</td>
          <td>{{ $course->updated_at }}</td>
          <td>{{ $course->deleted_at }}</td>
        </tr>
        <tr>
          <td></td>
          <td><input type="text" class="form-control" name="name" value="{{ $course->name }}"></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="container-fluid" style="margin-top: 50px;">
  <h5>包含しているclazzes</h5>
</div>
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
        <th>deleted_at</th>
      </thead>
      @foreach($course->clazzes as $clazz)
      <tr>
        <td>{{ $clazz->id }}</td>
        <td>{{ $clazz->name }}</td>
        <td>{{ $clazz->year }}</td>
        <td>{{ $clazz->season }}</td>
        <td>{{ $clazz->type }}</td>
        <td>{{ $clazz->created_at }}</td>
        <td>{{ $clazz->updated_at }}</td>
        <td>{{ $clazz->deleted_at }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>

<div class="container-fluid" style="margin-top: 50px;">
  <h5>包含していないclazzes</h5>
</div>
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
        <th>deleted_at</th>
      </thead>
      @foreach($unrelatedClazzes as $clazz)
      <tr>
        <td>{{ $clazz->id }}</td>
        <td>{{ $clazz->name }}</td>
        <td>{{ $clazz->year }}</td>
        <td>{{ $clazz->season }}</td>
        <td>{{ $clazz->type }}</td>
        <td>{{ $clazz->created_at }}</td>
        <td>{{ $clazz->updated_at }}</td>
        <td>{{ $clazz->deleted_at }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@stop

@section('js')
<script>
  console.log('ページごとJSの記述');
</script>
@stop
