@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>courses/edit</h1>
@stop

@section('content')
<form>
  <div class="card">
    <div class="card-body p-0">
      <table class="table table-striped">
        <tr>
          <th>id</th>
          <th>name</th>
          <th>created_at</th>
          <th>updated_at</th>
          <th>deleted_at</th>
        </tr>
        <tr>
          <td>{{ $course->id }}</td>
          <td>{{ $course->name }}</td>
          <td>{{ $course->created_at }}</td>
          <td>{{ $course->updated_at }}</td>
          <td>{{ $course->deleted_at }}</td>
        </tr>
        <tr>
          <td></td>
          <td><input type="text" class="form-control" value="{{ $course->name }}"></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop

@section('js')
<script>
  console.log('ページごとJSの記述');
</script>
@stop
