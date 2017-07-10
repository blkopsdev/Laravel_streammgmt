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

    <title>Conference Connect</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="/assets/bootstrap-3.3.6/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="/assets/template.css" rel="stylesheet">

    <link href="/assets/sandstone-bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/font-awesome-4.5.0/css/font-awesome.min.css">

    <style>
    .panel-heading.accordion-toggle:after {
        /* symbol for "opening" panels */
        font-family:'Glyphicons Halflings';
        /* essential for enabling glyphicon */
        content:"\e114";
        /* adjust as needed, taken from bootstrap.css */
        float: right;
        position: relative;
        bottom: 23px;
        font-size: 15pt;
        /* adjust as needed */
        color: white;
        /* adjust as needed */
    }
    .panel-heading.accordion-toggle.collapsed:after {
        /* symbol for "collapsed" panels */
        content:"\e080";
        /* adjust as needed, taken from bootstrap.css */
    }

    .panel-heading:hover {
        cursor: pointer;
    }

    .panel-heading:hover h4 {
        text-decoration: underline;
    }

    </style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/assets/bootstrap-3.3.6/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="/assets/bootstrap-3.3.6/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <a class="name navbar-brand" href="http://www.aleph-com.net" title="Home">Aleph Communications</a>
        </div>
      </div>
    </nav>
      <form role="form" data-toggle="validator">
    <div class="container">

      <div class="row">
        <div class="col-md-6">
          <h1 class="text-center">Connect Conference Bridges</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Bridge Details</h2>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="inputSourceBridgeID">Bridge ID (Bridge you want to listen to.  5-7 digit number)</label>
                    <input type="number" min="10000" max="9999999" class="form-control" id="inputSourceBridgeID" placeholder="Source Bridge ID" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="inputDestinationBridgeID">Your Bridge ID</label>
                    <input type="number" min="10000" max="9999999" class="form-control" id="inputDestinationBridgeID" placeholder="Destination Bridge ID" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="inputDestinationBridgePIN">Your Bridge PIN</label>
                    <input type="number" min="0" max="9999" class="form-control" id="inputDestinationBridgePIN" placeholder="Destination Bridge PIN" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="inputCallLength">Length of Call (Minutes) 0-240</label>
                    <input class="bar" type="range" min="10" max="240" step="10" id="inputCallLength" value="120" onchange="rangevalue.value=value"/>
                    <output id="rangevalue">120</output>
                </div>
                <button id="ConnectButton" type="button" class="btn btn-warning btn-block">
                Click to Connect Bridges
                </button>
                <div id="BridgeManagementDiv">

                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </form>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/assets/jquery/1.11.3/jquery.min.js"></script>
    <script src="/assets/bootstrap-3.3.6/js/bootstrap.min.js"></script>
    <script src="/assets/validator.min.js"></script>
    <!--<script src="/assets/audiojs/audio.min.js"></script>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="/assets/bootstrap-3.3.6/js/ie10-viewport-bug-workaround.js"></script>-->

<script type="text/javascript">

$('#ConnectButton').click(function() {
    //console.log("click");
    if ($("#inputSourceBridgeID").val() !== "" 
            && $("#inputDestinationBridgeID").val() !== ""
            && $("#inputDestinationBridgePIN").val() !== "" ) 
    {
        var url = 'http://icecast.aleph-com.net/index.php/control/connect/'
            + $("#inputSourceBridgeID").val() + '/'
            + $("#inputDestinationBridgeID").val() + '/'
            + $("#inputDestinationBridgePIN").val() + '/'
            + $("#inputCallLength").val();
        console.log(url);
        $.post( url );
        alert("Connecting Conference Bridges");
        $("#BridgeManagementDiv").html('<a class="btn btn-success btn-block" href="http://conference.aleph-com.net/Panel?bridgeNum='
            + $("#inputDestinationBridgeID").val()
            + '&pin='
            + $("#inputDestinationBridgePIN").val()
            + '&partnerID=aleph#lcm">Launch Conference Management Site</a>');
        $("#ConnectButton").removeClass("btn-warning")
            .addClass("btn-success")
            .text("Reload Screen to Connect Another Bridge")
            .prop('disabled', true);


    }
    //icecast.aleph-com.net/index.php/control/connect/7530165/10001/9728/240
});

</script>
