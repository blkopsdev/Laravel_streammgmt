@extends('layouts.app')


@section('style')
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
@endsection


@section('content')
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">{{ $mount->description }} - Listener Page</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title"><i class="fa fa-headphones"></i> Listen in your browser now</h2>
            </div>
            <div class="panel-body">
              <button id="statusButton" type="button" class="btn btn-warning btn-block">
                <i id="refreshIcon" class="fa fa-refresh fa-spin"></i>
                <span id="statusButtonText"> Checking Stream Status</span>. Click to Refresh.
              </button>
              <br>
              <div align="center">
                <audio controls preload="none">
                  <source src="http://icecast.aleph-com.net:8000/{{$mount->mount}}.mp3" type="audio/mp3" >
                    Unsupported Browser.  Please use link below or click on "Advanced Options".
                </audio>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-phone"></i> Telephone Access</h3>
            </div>
            <div class="panel-body">
              @foreach($dids as $did)
              <a class="btn btn-primary btn-block" href="tel:1-{{$did->did}}">
                <i class="fa fa-phone-square"></i>  1-{{$did->did }} {{ $did->geo_location}}</a>
              @endforeach
            </div>
          </div>
        </div>
      </div>

  <div class="panel panel-primary">
    <div class="panel-heading accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne">
             <h4 class="panel-title">Advanced Options</h4>
        </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-plug" aria-hidden="true"></i> Connect your EasyStream</h3>
            </div>
            <div class="panel-body">
                <a class="btn btn-primary btn-block" href="https://www.dropbox.com/s/26e13988w8220q0/EasyStream%20Quick%20Start%20Guide%20V2.pdf?dl=0"><i class="fa fa-cloud-download" aria-hidden="true"></i> EasyStream Manual</a>
                <ol>
                    <li>Connect to your EasyStream with your web browser.</li>
                    <li>Open the Listen + tab</li>
                    <li>Enter the link below into the URL box.</li>
                    <li>Enter the name below into the Name box.</li>
                    <li>Switch back to the Listen tab and press the bottom Listen button.</li>
                </ol>
                <p>URL: <b>icecast.aleph-com.net:8000/<?php echo $mount->mount; ?></b></p>
                <p>Name: <b><?php echo $mount->description; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-plug" aria-hidden="true"></i> Conference Bridging</h3>
            </div>
            <div class="panel-body">
                <a target="_blank" class="btn btn-primary btn-block" href="https://www.aleph-com.net/conferencing-and-streaming/connect-conference-bridges/ "><i class="fa fa-external-link" aria-hidden="true"></i> Join Conference Tool</a>
                <p>Bridge ID of this conference: <b><?php echo $mount->mount; ?></b></p>
                <p></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-music"></i> M3U Audio File</h3>
            </div>
            <div class="panel-body">
              Open this file in your favorite app on your computer, smartphone, or tablet.<br><br>
              <a class="btn btn-primary btn-block" href="/index.php/stream/m3u/{{$mount->alias}}" role="button"><i class="fa fa-download"></i> Download</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Recommended Client Software</h3>
            </div>
            <div class="panel-body">
              <p class="lead">VLC media player is a free and open source cross-platform multimedia player.  It's available for most common platforms and is our recommended software client for those not wanting to play audio directly from their browser.</p>
            <div class="row">
        <div class="col-md-3">
          <h2><i class="fa fa-android"></i> Android</h2>
          <ul class="list-group">
            <li class="list-group-item">
              <a class="btn btn-primary btn-block" href="https://play.google.com/store/apps/details?id=org.videolan.vlc&hl=en" role="button">
              <img src="/assets/images/vlc_for_android.png" style="width:50px;height:50px;"> VLC for Android</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h2><i class="fa fa-apple"></i> iOS</h2>
          <ul class="list-group">
            <li class="list-group-item">
              <a class="btn btn-primary btn-block" href="https://itunes.apple.com/ca/app/vlc-for-mobile/id650377962?mt=8" role="button">
              <img src="/assets/images/vlc_for_ios.png" style="width:50px;height:50px;"> VLC for Mobile</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h2><i class="fa fa-apple"></i> Mac</h2>
          <ul class="list-group">
            <li class="list-group-item">
              <a class="btn btn-primary btn-block" href="http://www.videolan.org/vlc/download-macosx.html" role="button">
              <img src="/assets/images/vlc_for_ios.png" style="width:50px;height:50px;"> VLC for Mac OS X</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h2><i class="fa fa-windows"></i> Windows</h2>
          <ul class="list-group">
            <li class="list-group-item">
              <a class="btn btn-primary btn-block" href="http://www.videolan.org/vlc/download-windows.html" role="button">
                <img src="/assets/images/vlc_for_android.png" style="width:50px;height:50px;"> VLC for Windows
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>




      </div>
    </div>

    </div><!-- /.container -->

@endsection

@section('javascript')

<script type="text/javascript">

function checkStreamStatus()
{
  $.get( "/index.php/stream/status/{{ $mount->mount}}", function(data) {
    console.log(data);
    $("#statusButtonText").text(data.message);
    $("#statusButton").removeClass();
    $("#refreshIcon").removeClass("fa-spin");
    if (data.status == 1) {
      $("#statusButton").addClass('btn btn-success btn-block');
      //$("#statusButton").text(data->message);
    } else {
      $("#statusButton").addClass('btn btn-danger btn-block');
    }
  });
}

      $(document).ready(function(){
        checkStreamStatus();
        $("#statusButton").click(function() {
          $("#statusButton").removeClass();
          $("#statusButton").addClass('btn btn-warning btn-block');
          $("#statusButtonText").text("Checking Status of Stream");
          $("#refreshIcon").addClass("fa-spin");
          checkStreamStatus();
        });

      });
</script>
@endsection
