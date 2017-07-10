    <div style='height:20px;'></div>
    <div class="row">
        <div class="col-md-2">
            <input class="btn btn-primary" type="button" id="refreshButton" value="Refresh">
        </div>
        <div class="col-md-2">
            Active Conferences: <span id="conferencesActive"></span>
        </div>
        <div class="col-md-2">
            Active Lines: <span id="linesActive"></span>
        </div>
    </div>
    <div id="conferenceListDiv" class="panel-group" role="tablist" aria-multiselectable="true">
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

function populateActiveBridgeDetails(conferenceID) {
    $.ajax({ // ajax call starts
        url: '/manage_conference/json_LCM_getConferenceInfo/' + conferenceID,
      		dataType: 'json', // Choosing a JSON datatype
      		success: function(data) // Variable data contains the data we get from serverside
      		{

//			console.log(data);
            $.each(data.responseList.requestItem[0].result, function(index, element) {
                $('#' + conferenceID + 'currentParticipants').html(element.currentParticipants);
                $('#badge' + conferenceID).text(element.currentParticipants);
                $('#' + conferenceID + 'peakParticipants').html(element.peakParticipants);
                console.log(element);
                $.each(element.calls.call, function(index, call) {
                    accessMethod = '';
                    if (call.accessMethod = 0) {
                        accessMethod = 'PSTN';
                    } else {
                        accessMethod = 'SIP';
                    }
                    host = '';
                    if (call.host = 0) {
                        host = 'HOST';
                    }
                    console.log(call);
                    $('#' + element.bridgeID + 'Calls').append('<li id="' + call.callID + '">' + accessMethod + ': ' + call.toNumber + ' ' + host + ' ' + call.fromNumber + ' / ' + call.fromName +  '</li>');
                });
                //$('#' + element.bridgeID + 'Calls').listview({defaults: true});

                linesActive = linesActive + parseInt(element.currentParticipants,10);
                $("#linesActive").html(linesActive);
                console.log(linesActive);
            });
        }
    });
}

function populateActiveBridges() {
    $.ajax({ // ajax call starts
        url: '/manage_conference/json_LCM_getConferences',
      		dataType: 'json', // Choosing a JSON datatype
      		success: function(data) // Variable data contains the data we get from serverside
      		{
            conferencesActive = 0;
            linesActive = 0;
            $.each(data.responseList.requestItem[0].result.conference, function(index, element) {
                $("#panel" + element.conferenceID).addClass("panel-success");
                conferencesActive++;
                $('#' + element.conferenceID ).val('ACTIVE');
                //$('#' + element.conferenceID + 'div').collapsible("refresh");
                $('#' + element.conferenceID + 'Body').html('<ul id="' + element.conferenceID + 'Calls"><li data-role="list-divider">ACTIVE SINCE - ' + timeConverter(element.started) + ' Current: <span id="' + element.conferenceID + 'currentParticipants"></span> Peak: <span id="' + element.conferenceID + 'peakParticipants"></span></li></ul>');
                populateActiveBridgeDetails(element.conferenceID);
                //$('#' + element.conferenceID + 'div-inner').trigger("expand").collapsible("refresh");
           		//	$('body').append($('<div>', {
                	//	text: element.name
            		//		}));
        		});
            $("#conferencesActive").html(conferencesActive);
			$("#linesActive").html(linesActive);
            console.log(linesActive);
            //console.log(data);
        }
    });
}


function populateBridges() {
    $.ajax({ // ajax call starts
        url: '/manage_conference/json_Bridge_getBridges',
      		dataType: 'json', // Choosing a JSON datatype
      		success: function(data) // Variable data contains the data we get from serverside
      		{
            //console.log(data.responseList.requestItem[0].result.bridge);
            //console.log(data);
            $.each(data.responseList.requestItem[0].result.bridge, function(index, element) {
                string = '<div class="panel panel-default" id="panel' + element.conferenceID + '"> '
                + ' <div class="panel-heading" role="tab" id="heading' + element.conferenceID + '">'
                + '  <h4 class="panel-title">'
                + '      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'
                + element.conferenceID + '" aria-expanded="true" aria-controls="collapse' + element.conferenceID + '">'
                + '          ' + element.conferenceID + ' - ' + element.name
                + '      </a> <span class="badge" id="badge' + element.conferenceID + '"></span>  '
                + '       <a class="btn btn-primary" role="button" href="http://api.aleph-com.net/conference/manage/'
                + element.conferenceID + '/' + element.pin + '">Manage</a>'
                + '  </h4>'
                + ' </div>'
                + ' <div id="collapse' + element.conferenceID + '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'
                + element.conferenceID + '">'
                + '  <div class="panel-body">'
                + '     Email: <span id="emailAddressListSpan' + element.conferenceID + '"></span><br>'
                + ' <ul id="' + element.conferenceID + 'Calls"></ul>'
                + ' <div id="#' + element.conferenceID + 'Body"></div>'
                + '      Anim <br>'
                + '     </div>'
                + ' </div>'
                + '</div>';

                $('#emailAddressListSpan' + element.conferenceID).text(element.notificationList + ',');
                $('#conferenceListDiv').append(string);
    		});

            populateActiveBridges();
        }
    });
};

$( document ).ready(function() {
    populateBridges();
    $("#refreshButton").click(function(){
        populateBridges();
    });
});
</script>
</body>
</html>