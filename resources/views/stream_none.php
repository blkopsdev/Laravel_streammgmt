<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Aleph Communications - Streaming Conference Control</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/template.css" rel="stylesheet">
    <link href="/assets/spacelab-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/font-awesome-4.5.0/css/font-awesome.min.css">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="name navbar-brand" href="http://www.aleph-com.net" title="Home">Aleph Communications Conference Services</a>
        </div>
      </div>
    </nav>

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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/assets/jquery/1.11.3/jquery.min.js"></script>
    <script src="/assets/bootstrap-3.3.6/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="/assets/bootstrap-3.3.6/js/ie10-viewport-bug-workaround.js"></script>-->
    <script type="text/javascript">

    $(document).ready(function(){
      $("#goButton").click(function() {
        window.location.assign('/index.php/stream/listen/' + $("#inputStream").text());
      });
    });
    </script>
  </body>
</html>
