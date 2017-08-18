@extends('layouts.app')

@section('content')
  <body>
    <a href="/home" class="btn btn-danger">HOME</a>
    <br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-4">
          <a href="/images/{{ $komens->image }}"><img class="img-responsive" alt="" src="/images/{{ $komens->image }}" style="width:300px;height:300px;"/></a>
    </div>
    <div class="col-md-8">
      <form class="form-group" action="{{ url('/create/komen/store',$komens)}}" method="POST">
      {{ csrf_field() }}
      <h3>Comment Box:</h3>
      <br>
      <textarea class="form-control" type="text" name="comment" rows="5" cols="60"></textarea>

      <br>
      <button class="btn btn-primary" type="submit" value="Submit">Submit</button

  </form>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="offset-md-2 col-md-10" >
      <table class="table table-responsive" align="center">
        <thead>
          <th>Name</th>
          <th>Comment</th>
          <th>Time</th>
        </thead>
        <tbody>
          @foreach($lists as $komen)
          <tr>
            <td>{{ $komen->user->name}}</td>
            <td>{{ $komen->comment}}</td>
            <td>{{ $komen->created_at->diffForHumans() }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>


</div>

  </body>

</html>
  @endsection
