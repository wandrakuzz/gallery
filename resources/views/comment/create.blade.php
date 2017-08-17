<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Comment</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- References: https://github.com/fancyapps/fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  </head>
  <body>
    <h1>Add Comment</h1>
<div class="container">
  <div class="row">
    <div class="col-md-4">
          <a href="/images/{{ $komens->image }}"><img class="img-responsive" alt="" src="/images/{{ $komens->image }}" style="width:300px;height:300px;"/></a>
          <div class="col-md-8" align="center">
              <h3 class='text-muted'>{{ $komens->title }}</h3>
          </div> <!-- text-center / end -->
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
</div>

  </body>
</html>
