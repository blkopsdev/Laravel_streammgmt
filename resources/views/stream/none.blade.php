@extends('layouts.app')


@section('content')

    <div class="container">

      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h1 class="text-center">No Stream Found</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <p class="lead text-center">Either you did not enter a stream or the name you entered is invalid</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="input-group">
            <input id="inputStream" type="text" class="form-control" placeholder="Stream Name...">
            <span class="input-group-btn">
              <button id="goButton" class="btn btn-primary" type="button">Go!</button>
            </span>
          </div><!-- /input-group -->
        </div>
      </div>

    </div><!-- /.container -->
@endsection

@section('javascript')
    <script type="text/javascript">

    $(document).ready(function(){
      $("#goButton").click(function() {
        window.location.assign('/index.php/stream/listen/' + $("#inputStream").text());
      });
    });
    </script>
@endsection
