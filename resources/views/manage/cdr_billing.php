  <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="historical_month_div">
                <h3>Months Back:</h3>
                <input class="form-control" id="historical_month" type="number" value="1" />
            </div>
            <div class="col-md-2">
                <h3>Begin:</h3>
                <input class="btn btn-primary" type="button" id="parseButton" value="Parse">
            </div>
            <div class="col-md-4">
                <span id="start_date"></span> - <span id="end_date"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8" id="bridge_detail_input_div">
                <h3>Copy and paste the contents of the Bridge Detail spreadsheet tab into here.</h3>
                <textarea class="form-control" id="bridgeDetailTextArea" ></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8" id="billingList">
            </div>
        </div>
    </div>

    <script>

var linesActive = 0;
var conferencesActive = 0;

function timeConverter(UNIX_timestamp){
  var a = new Date(UNIX_timestamp*1000);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes();
  var sec = a.getSeconds();
  var time = year + '-' + month + '-' + date + ' '  + hour + ':' + min + ':' + sec ;
  return time;
}



function populateBridgeDetail(id) {
    $.ajax({ // ajax call starts
        url: '/api/conference_lookup/get_conference/' + id,
        dataType: 'json', // Choosing a JSON datatype
  		success: function(data) // Variable data contains the data we get from serverside
        {
            if (null != data) {
                //console.log(data);
                //console.log(id + ": " + data.name + "  " + "#stream" + id + "Name");
                $("#stream" + id + "Name").html( data.bridge.name);
                var billableBridge = "";
                if (data.bridge.billing == 1) {
                    billableBridge = "Not Setup";
                } else if (data.bridge.billing == 2) {
                    billableBridge = "Yes";
                } else if (data.bridge.billing == 3) {
                    billableBridge = "No Charge";
                    $("#row" + id).hide();
                }

                $("#conf" + id + "BillableBridge").text(billableBridge);

                var billableDids = "No";
                $.each(data.dids, function(index,did) {
                    if (did.billing !== "1") {
                        billableDids = "Yes";
                    } else {
                        //$("#row" + id).hide();
                    }
                    //console.log(did);
                });
                if (billableDids === "No") {
                    $("#row" + id).hide();
                }
                $("#conf" + id + "BillableDIDs").text(billableDids);
            }
        }
    });
}

function pullCDRData() {
    $.ajax({ // ajax call starts
        url: '/api/fs_cdr/get_previous_month_stream_stats/' + $("#historical_month").val(),
      		dataType: 'json', // Choosing a JSON datatype
      		success: function(data) // Variable data contains the data we get from serverside
      		{
            $.each(data.result, function(index, record) {
                //if (/\*/.test(record.destination)) {
                    //result = record.destination.split(/\*/);
                    console.log(record);
                    console.log("#stream" + record.destination + "Used");
                    $("#stream" + record.destination + "Used").html(record.bill_minutes);
                    /*string += '<tr style="display: none;" id="row' + result[0] + '"><td id="stream' + result[0] + 'Name">'
                        + '</td><td>' + result[0]
                        + '</td><td id="stream' + result[0] + 'Used">' + record.bill_minutes
                        + '</td><td id="conf' + result[0] + 'Used">'
                        + '</td><td id="conf' + result[0] + 'Billable">'
                        + '</td></tr>';  */
                    $("#start_date").html(record.start_date);
                    $("#end_date").html(record.end_date);
                //}
    		});

            //var rows = $(".bridge-row");
            $(".bridge-row").each(function() {
                var bridgeID = $(this).find('td').eq(1).text();
                //var streamMinutes =
                var streamMinutes = $(this).find('td').eq(3).text();
                streamMinutes = parseInt(streamMinutes);
                var sipMinutes = $(this).find('td').eq(4).text();
                sipMinutes = parseInt(sipMinutes);
                var billableMinutes = sipMinutes - streamMinutes;
                //console.log("bridgeID: " + bridgeID);
                if (billableMinutes > 150) {
                    $("#conf" + bridgeID + "Billable").html("<b>" + billableMinutes + "</b>");
                } else {
                    $("#row" + bridgeID).hide();
                }
                console.log("Bridge: "
                    + bridgeID
                    + " streamMinutes: "
                    + streamMinutes
                    + " billableMinutes: "
                    + billableMinutes
                    );
            });
            $("#bridgeDetailTextArea").hide();
            $("#parseButton").hide();
            $("#historical_month_div").hide();
            /*$.each(rows, function(index, row) {
                console.log(row);
                var bridge = $(row.cells[1]).val();
                console.log(bridge);
                //console.log(row.cells[1].val());
            }); */

        }
    });
};

$( document ).ready(function() {
});

$("#parseButton").click(function(){
    str = $("#bridgeDetailTextArea").val();
    var rows = [];
    var x = str.split("\n");
    var string = '<table class="table table-striped"><tr><th>Bridge Name</th><th>Bridge ID</th><th>Billable Min.</th>'
        + '<th>Stream Min.</th><th>Sip Min.</th><th>Billable Bridge</th><th>Billable DIDs</th></tr>';
    for (var i=0; i<x.length; i++) {
        //console.log(x);
        y = x[i].split('\t');
        rows[i] = y;
        //console.log(x);
        var bridgeID = y[0];
        bridgeID = bridgeID.replace(/-/g, "").replace(/"/g,"").replace(/\s*/g, "");
        if (/\d*/.test(bridgeID)) {
            console.log("Bridge: " + bridgeID);
            var sipMinutes = y[10] + '';
            sipMinutes = sipMinutes.replace(/,/g, "").replace(/"/g,"").replace(/-/g, "").replace(/\s*/g, "");
            console.log("sipMinutes: " + sipMinutes);
            if (sipMinutes.length == 0) {
                sipMinutes = 0;
            }
            sipMinutes = parseInt(sipMinutes);
            if (sipMinutes !== 0 && Number.isInteger(sipMinutes)) {
            string += '<tr class="bridge-row" id="row' + bridgeID + '"><td id="stream' + bridgeID + 'Name">'
                + y[1]
                + '</td><td>' + bridgeID
                + '</td><td id="conf' + bridgeID + 'Billable">0'
                + '</td><td id="stream' + bridgeID + 'Used">0'
                + '</td><td id="conf' + bridgeID + 'Used">' + sipMinutes
                + '</td><td id="conf' + bridgeID + 'BillableBridge">'
                + '</td><td id="conf' + bridgeID + 'BillableDIDs">'
                + '</td></tr>';
            }


            console.log("Bridge: " + bridgeID + " Sip Minutes: " + sipMinutes);
            //$("#conf" + bridgeID + "Used").html(sipMinutes);

            //var used = parseInt($("#stream" + bridgeID + "Used").html());
            //var billable = sipMinutes - used;

            //console.log("Sip Minutes: " + sipMinutes + " Used: " + used + " Billable: " + billable);
            //$("#conf" + bridgeID + "Billable").html(billable);
            populateBridgeDetail(bridgeID);
            //if (billable > 20  || billable < -10) {
            //    $("#row" + bridgeID).show();
            //}
        }

    }
    string += '</table>'
    $('#billingList').html(string);
    pullCDRData();

    //console.log(rows);
});
</script>
</body>
</html>