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
  <button type="submit" class="btn btn-primary">update</button>
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
        <th style="width: 100px">out</th>
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
        <td><button onclick="destroy(event, <?= $clazz->id ?>, <?= $course->id ?>)" type="button" class="btn btn-block btn-danger">out</button></td>
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
        <th style="width: 100px">in</th>
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
        <td><button onclick="store(event, <?= $clazz->id ?>, <?= $course->id ?>)" type="button" class="btn btn-block btn-primary">in</button></td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
<form id="commonForm">
  @csrf
</form>
@stop

@section('js')
<script>
  const commonFormSubmit = (action, method, moreHtml = '') => {
    const form = document.getElementById('commonForm');
    form.action = action;
    form.method = method;
    form.innerHTML += moreHtml;
    form.submit();
  };
  const store = (event, clazz_id, course_id) => {
    let html = '';
    html += `<input type="hidden" name="clazz_id" value="${clazz_id}">`;
    html += `<input type="hidden" name="course_id" value="${course_id}">`;
    commonFormSubmit(`/clazz_course`, 'post', html);
    event.stopPropagation();
  }
  const destroy = (event, clazz_id, course_id) => {
    let html = '';
    html += '<input type="hidden" name="_method" value="DELETE">';
    html += `<input type="hidden" name="clazz_id" value="${clazz_id}">`;
    html += `<input type="hidden" name="course_id" value="${course_id}">`;
    commonFormSubmit(`/clazz_course/0`, 'post', html);
    event.stopPropagation();
  }
</script>
@stop
