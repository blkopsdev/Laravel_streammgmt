
@section('style')
  <link href="/assets/player/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />

  <!--<link rel="stylesheet" href="/assets/offline-theme-default.css" />
  <link rel="stylesheet" href="/assets/offline-language-english.css" />-->

  <style>
    .panel-heading.accordion-toggle:after {
      /* symbol for "opening" panels */
      font-family: 'Glyphicons Halflings';
      /* essential for enabling glyphicon */
      content: "\e114";
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
      content: "\e080";
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
        <h1 class="text-center"><?php echo $mount->description; ?> - Listener Page</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title"><i class="fa fa-headphones"></i> Listen in your browser now</h2>
          </div>
          <div class="panel-body">
            <button id="statusButton" type="button" class="btn btn-success btn-block">
                <i id="refreshIcon" class="fa fa-refresh"></i>
                <span id="statusButtonText">Stream is Online</span>. Click to Refresh.
              </button>
            <br>
            <div align="center">

              <!-- The new player with default skin -->
              <div id="jquery_jplayer_1" class="jp-jplayer"></div>
              <div id="jp_container_1" class="jp-audio-stream" role="application" aria-label="media player">
                <div class="jp-type-single">
                  <div class="jp-gui jp-interface">
                    <div class="jp-controls">
                      <button class="jp-play" role="button" tabindex="0">play</button>
                    </div>
                    <div class="jp-volume-controls">
                      <button class="jp-mute" role="button" tabindex="0">mute</button>
                      <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                      <div class="jp-volume-bar">
                        <div class="jp-volume-bar-value"></div>
                      </div>
                    </div>
                  </div>
                  <div class="jp-details">
                    <div id="stream-status" aria-label="status">&nbsp;</div>
                  </div>
                  <div class="jp-no-solution">
                    <span>Update Required</span> To play the media you will need to either update your browser to a recent
                    version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                  </div>
                </div>
              </div>

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
                  <a target="_blank" class="btn btn-primary btn-block" href="https://www.aleph-com.net/conferencing-and-streaming/connect-conference-bridges/"><i class="fa fa-external-link" aria-hidden="true"></i> Join Conference Tool</a>
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
                  <a class="btn btn-primary btn-block" href="http://icecast.aleph-com.net/index.php/stream/m3u/<?php echo $mount->alias;?>" role="button"><i class="fa fa-download"></i> Download</a>
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
                  <p class="lead">VLC media player is a free and open source cross-platform multimedia player. It's available for most common
                    platforms and is our recommended software client for those not wanting to play audio directly from their
                    browser.
                  </p>
                  <div class="row">
                    <div class="col-md-3">
                      <h2><i class="fa fa-android"></i> Android</h2>
                      <ul class="list-group">
                        <li class="list-group-item">
                          <a class="btn btn-primary btn-block" href="https://play.google.com/store/apps/details?id=org.videolan.vlc&amp;hl=en" role="button">
                            <img src="./static/vlc_for_android.png" style="width:50px;height:50px;"> VLC for Android</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-3">
                      <h2><i class="fa fa-apple"></i> iOS</h2>
                      <ul class="list-group">
                        <li class="list-group-item">
                          <a class="btn btn-primary btn-block" href="https://itunes.apple.com/ca/app/vlc-for-mobile/id650377962?mt=8" role="button">
                            <img src="./static/vlc_for_ios.png" style="width:50px;height:50px;"> VLC for Mobile</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-3">
                      <h2><i class="fa fa-apple"></i> Mac</h2>
                      <ul class="list-group">
                        <li class="list-group-item">
                          <a class="btn btn-primary btn-block" href="http://www.videolan.org/vlc/download-macosx.html" role="button">
                            <img src="./static/vlc_for_ios.png" style="width:50px;height:50px;"> VLC for Mac OS X</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-3">
                      <h2><i class="fa fa-windows"></i> Windows</h2>
                      <ul class="list-group">
                        <li class="list-group-item">
                          <a class="btn btn-primary btn-block" href="http://www.videolan.org/vlc/download-windows.html" role="button">
                            <img src="./static/vlc_for_android.png" style="width:50px;height:50px;"> VLC for Windows
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

      </div>
    </div>
  </div>
      <!-- /.container -->

@sendsection

@section('javascript')
      <script type="text/javascript" src="/assets/player/js/jquery.jplayer.min.js"></script>

      <!--<script src="/assets/audiojs/audio.min.js"></script>-->
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <!--<script src="/assets/bootstrap-3.3.6/js/ie10-viewport-bug-workaround.js"></script>-->

      <script type="text/javascript">
      /*Offline.options = {
          // Should we check the connection status immediatly on page load.
          //checkOnLoad: true,

          checks: {
              image: {
                  url: '/assets/images/icons-png/bars-black.png'
              },
              active: 'image'
          },

          // Should we monitor AJAX requests to help decide if we have a connection.
          interceptRequests: true,

          // Should we automatically retest periodically when the connection is down (set to false to disable).
          reconnect: {
            // How many seconds should we wait before rechecking.
            initialDelay: 3,
          },

          // Should we store and attempt to remake requests which fail while the connection is down.
          requests: false,
        };

        var run = function(){
            if (Offline.state === 'up') {
                Offline.check();
            }
        }
        setInterval(run, 1000);*/

        function checkStreamStatus() {
          $.get("/index.php/stream/status/<?php echo $mount->mount; ?>", function (data) {
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

        $(document).ready(function () {

          checkStreamStatus();
          $("#statusButton").click(function () {
            $("#statusButton").removeClass();
            $("#statusButton").addClass('btn btn-warning btn-block');
            $("#statusButtonText").text("Checking Status of Stream");
            $("#refreshIcon").addClass("fa-spin");
            checkStreamStatus();
          });


          var stream = {
            title: "<?php echo $mount->description; ?>",
            mp3: "http://icecast.aleph-com.net:8000/<?php echo $mount->mount; ?>.mp3"
          },
            ready = false,
            playing = false,
            stoppedOnFailure = false,
            reconnectInterval = 1000 * 10, // The second number is in seconds
            reconnectIntervalHandle = void 0;

          function setPlayerStatus(status) {
            $("#stream-status").text(status);
          }

          function handleStreamError() {
            if (!playing || reconnectIntervalHandle) {
              return;
            }
            playing = false;
            setPlayerStatus("Error, trying to reconnect...");
            stoppedOnFailure = true;
            reconnectToStream();
            // Try to reconnect on timer events
            reconnectIntervalHandle = setInterval(reconnectToStream, reconnectInterval);
          }

          function reconnectToStream() {
            //Offline.check();
            console.log("Player: reconnecting...");
            player.jPlayer("clearMedia");
            player.jPlayer("play");
          }

          var player = $("#jquery_jplayer_1").jPlayer({
            ready: function (event) {
              ready = true;
              $(this).jPlayer("setMedia", stream);
            },
            pause: function () {
              console.log("Player: pause");
              $(this).jPlayer("clearMedia");
              if (!stoppedOnFailure) {
                setPlayerStatus("Stopped");
              }
              playing = false;
            },
            play: function (e) {
              console.log("Player: play");
              if(!reconnectIntervalHandle){
                setPlayerStatus("Loading...");
              }
            },
            playing: function (e) {
              console.log("Player: playing");
              playing = true;
              setPlayerStatus("Playing");
              clearInterval(reconnectIntervalHandle);
              reconnectIntervalHandle = void 0;
              stoppedOnFailure = false;
            },
            /*progress: function (e) {
              console.log("Player: progress", e)
              //handleStreamError();
            }, */
            stalled: function (e) {
              console.log("Player: stalled", e);
              handleStreamError();
              Offline.check();
            },
            suspend: function (e) {
              console.log("Player: suspended", e)
              handleStreamError();
            },

            abort: function (e) {
              console.log("Player: aborted", e)
              handleStreamError();
            },

            emptied: function (e) {
              console.log("Player: emptied", e)
              handleStreamError();
            },
            ended: function (e) {
              console.log("Player: ended", e)
              handleStreamError();
            },

            error: function (event) {
              console.log("Player: error")
              if (ready && event.jPlayer.error.type === $.jPlayer.error.URL_NOT_SET) {
                // Setup the media stream again and play it.
                $(this).jPlayer("setMedia", stream).jPlayer("play");
              }
            },
            swfPath: "/assets/player/js/", // Path to jquery.jplayer.swf for Flash fallback
            supplied: "mp3",
            preload: "none",
            wmode: "window",
            solution: 'html, flash',
            useStateClassSkin: true,
            autoBlur: false,
            keyEnabled: true
          });

        });
      </script>
@endsection
