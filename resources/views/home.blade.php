@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Laravel - Image Gallery CRUD Example</h3>
    <form action="{{ url('/upload') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">

        {!! csrf_field() !!}

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif

        <div class="row">
            <div class="col-md-5">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="col-md-5">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-2">
                <br/>
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
    </form>
    <br>
    <br>

    <div class="row">
    <div class='list-group gallery'>
            @if($images->count())
                @foreach($images as $image)
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' style="width:300px;height:300px; margin-bottom:100px;">
                    <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">
                        <img class="img-responsive" alt="" src="/images/{{ $image->image }}" style="width:300px;height:300px;" />
                        <div class='text-center'>
                            <small class='text-muted'>{{ $image->title }}</small>
                        </div> <!-- text-center / end -->
                    </a>


                    <form action="{{ url('/delete',$image->id) }}" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    {!! csrf_field() !!}
                    <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                    </form>
                    <div class="" align="center">
                      <a href="{{ url('/create/komen',$image->id)}}" class="btn btn-warning btn-sm">Add Comment</a>&nbsp&nbsp
                    </div>
                </div> <!-- col-6 / end -->
                @endforeach
            @endif

        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->
@endsection
