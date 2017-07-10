    <div style='height:20px;'></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                Conference Name: <input type="text" class="form-control" id="conference_name"/>
            </div>
            <div class="col-md-2">
                Email: <input type="text" class="form-control" id="email"/>
            </div>
            <div class="col-md-2">
                Location: <input type="text" class="form-control" id="location"/>
            </div>
            <div class="col-md-2">
                Name Short (Mount): <input type="text" class="form-control" id="name_short"/>
            </div>
            <div class="col-md-2">
                Max Listeners: <input type="number" class="form-control" id="max_listeners"/>
            </div>
            <div class="col-md-2">
                Mount Password: <input type="text" class="form-control" id="mount_password"/>
            </div>
            <div class="col-md-2">
                <input class="btn btn-default" type="button" value="Order Bridge" id="orderBridge">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                New Bridge ID:
            </div>
            <div class="col-md-2">
                <span id="newBridgeID"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                New Bridge PIN:
            </div>
            <div class="col-md-2">
                <span id="newBridgePIN"></span>
            </div>
        </div>
    </div>

<script>
    $("#orderBridge").click(function() {
        $.post( "/index.php/api/conference/bridge/create",
            {
                conference_name: $("#conference_name").val(),
                email: $("#email").val(),
                location: $("#location").val(),
                name_short: $("#name_short").val(),
                max_listeners: $("#max_listeners").val(),
                mount_password: $("#mount_password").val(),
            }
        )
        .done(function(data) {
            $("#newBridgeID").text(data.bridgeID);
            $("#newBridgePIN").text(data.pin);
            console.log(data);
        })
    });

    $( document ).ready(function() {
        //populateBridges();
    });
</script>
</body>
</html>