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
                    <h3>Order Transcription</h3>
                    <h4>Conference Bridge: <?php echo $bridge_id; ?></h4>
                    <h4>Call ID: <?php echo $conference_id; ?></h4>
                    <h4>Call Length (Minutes): <?php echo ceil($conference_duration / 60); ?></h4>
                    <form id="order_transcription">
                        <input class="hidden" type="text" id="recording" name="recording" value="<?php echo $link; ?>" readonly>
                        <input class="hidden" type="text" id="conference_id" name="conference_id" value="<?php echo $conference_id; ?>" readonly>
                        <div class="form-group">
                            <label for="email_address">Email address</label>
                            <input type="email" class="form-control" id="email_address" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" required>
                        </div>
                        <div class="form-group">
                            <label for="mailing_address">Mailing Address</label>
                            <input type="text" class="form-control" id="mailing_address" name="address" placeholder="Mailing Address" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                        </div>
                        <div class="form-group">
                            <label for="state">State / Province</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="State / Province" required>
                        </div>
                        <div class="form-group">
                            <label for="zip">Zip / Postal Code</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip / Postal Code" required>
                        </div>
                        <div class="form-group">
                            <label for="transcription_quality">Transcription Quality - $USD</label>
                            <select class="form-control" name="transcription_quality" required>
                                <option>$0.50/minute - Medium Quality (3 weeks) $<?php echo number_format($transcription_duration*0.50, 2, '.', ''); ?></option>
                                <!--<option>$0.75/minute - Medium Quality (1 week) $<?php echo number_format($transcription_duration*0.75, 2, '.', ''); ?></option> -->
                                <option selected="selected">$1.00/minute - High Quality (2 weeks) $<?php echo number_format($transcription_duration*1.00, 2, '.', ''); ?></option>
                                <!--<option>$1.25/minute - High Quality (1 week) $<?php echo number_format($transcription_duration*1.25, 2, '.', ''); ?></option> -->
                                <option>$1.50/minute - Top Quality (72 hours) $<?php echo number_format($transcription_duration*1.50, 2, '.', ''); ?></option>
                            </select>
                            <h4>30 minute minimum charge on transcriptions.</h4>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Order</button>
                        <h4>Conference owners will receive email confirmation on transcription orders.</h4>
                    </form>
                </div>
            </div>

    </div>


    </body>
    <script>
    $("#order_transcription" ).submit(function( event ) {
        $.post("/api/conference/transcription/order_submit", {
            conference_id: $("#conference_id").val(),
            email_address: $("#email_address").val(),
            full_name: $("#full_name").val(),
            mailing_address: $("#mailing_address").val(),
            city: $("#city").val(),
            state: $("#state").val(),
            zip: $("#zip").val(),
            transcription_quality: $("#transcription_quality").val(),
            recording: $("#recording").val()
        })
        .done(function( data ) {
            alert( data );
        });
        event.preventDefault();
    });
    </script>
</html>