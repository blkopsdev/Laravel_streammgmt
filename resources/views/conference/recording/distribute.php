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
                    <a class="navbar-brand" href="#">Conference Management</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#">
                                <i class="fa fa-home" aria-hidden="true"></i> Home
                            </a>
                        </li>
                        <li>
                            <a href="#about">
                                <i class="fa fa-info-circle" aria-hidden="true"></i> About
                            </a>
                        </li>
                        <li>
                            <a href="https://www.aleph-com.net/conferencing-and-streaming/connect-conference-bridges/">
                                <i class="fa fa-plug" aria-hidden="true"></i> Connect Bridges
                            </a>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="https://www.aleph-com.net/wp-content/uploads/2016/05/aleph-com_trans.gif" class="img-responsive" alt="Aleph Logo" />
                </div>
                <div class="col-md-4">
                    <form id="distribute_recording">
                    <h3>Distribute Recording</h3>
                    <h4>Conference Bridge: <?php echo $bridge_id; ?></h4>
                    <h4>Call ID: <?php echo $conference_id; ?></h4>
                    <h4>Call Start: <?php echo base64_decode($started_date); ?></h4>
                    <div class="form-group">
                         <label for="inputEmail">Email</label>
                        <input class="form-control" id="inputEmail" type="email" required/>
                    </div>
                    <div class="form-group">
                         <label for="inputNumberofListens">Number of listens</label>
                        <input class="form-control" id="inputNumberofListens" type="number" value="5" min="1" max="10" id="number" required/>
                    </div>
                    <div class="form-group">
                        <label for="inputExpirationDate">Expiration Date</label>
                        <input type="date" class="form-control" id="inputExpirationDate" value="<?php echo date("Y-m-d", strtotime("+1 week"));?>" required/>
                    </div>
                    <button id="retrievePin" type="submit" class="btn btn-primary">Retrieve Pin</button>
                    </form>
                </div>
            </div>

    </div>


    </body>
    <script>
    var conference_id= '<?php echo $conference_id; ?>';
    var bridge = '<?php echo $bridge_id; ?>';
    var started_date = '<?php echo $started_date; ?>';
    var link = '<?php echo $link; ?>';

    $(document).ready( function() {

        $("#distribute_recording" ).submit(function( event ) {
            $.post("/api/conference/recording/order_submit", {
                conference_id: conference_id,
                email_address: $("#inputEmail").val(),
                listens: $("#inputNumberofListens").val(),
                expiration_date: $("#inputExpirationDate").val(),
                recording: link
            })
            .done(function( data ) {
                alert( data );
            });
            event.preventDefault();
        });

    });
    </script>
</html>