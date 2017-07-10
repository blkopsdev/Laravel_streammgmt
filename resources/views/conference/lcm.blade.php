@extends('conference.layout')

@section('title', 'Page Title')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="https://www.aleph-com.net/wp-content/uploads/2016/05/aleph-com_trans.gif" class="img-responsive" alt="Aleph Logo" />
                </div>
                <div class="col-md-4">
                    <h3>DIAL-IN&nbsp;NUMBERS</h3>
                    <h4>Toll: <span id="bridgeTollNumberFormatted"></span></h4>
                    <h4>Toll Free: <span id="bridgeTollFreeNumberFormatted"></span></h4>
                </div>
                <div class="col-md-4">
                    <h3><span id="bridgeName"></span></h3>
                    <h4>Conference ID: <span id="bridgeConferenceID"></span></h4>
                    <h4>Host PIN: <span id="bridgeHostPin"></span></h4>
                </div>
            </div>
    @if (!isset($error) || is_null($error))
    <div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#lcm" aria-controls="home" role="tab" data-toggle="tab">
                <i class="fa fa-gamepad" aria-hidden="true"></i> Live Call Management
            </a>
        </li>
        <li role="presentation">
            <a href="#history" aria-controls="history" role="tab" data-toggle="tab">
                <i class="fa fa-history" aria-hidden="true"></i> History
            </a>
        </li>
        <li role="presentation">
            <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
                <i class="fa fa-sliders" aria-hidden="true"></i> Settings
            </a>
        </li>
        <li role="presentation">
            <a href="#stream" aria-controls="stream" role="tab" data-toggle="tab">
                <i class="fa fa-music" aria-hidden="true"></i> Stream
            </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="lcm">
            <iframe height="600px" width="1024px"
                src="http://conference.aleph-com.net/?compact&amp;authToken={{ htmlspecialchars(urlencode($data->bridge->authToken)) }}"
                frameBorder="0" seamless="seamless">
            </iframe>
        </div>
        <div role="tabpanel" class="tab-pane" id="history">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="startedDate">Start Date</label>
                        <input id="startedDate" class="form-control" placeholder="Start Date">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="endedDate">End Date</label>
                        <input id="endedDate" class="form-control" placehold="End Date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="timezoneSelect">Time Zone</label>
                    <select class="form-control" id="timezoneSelect">
                        <option value="Etc/GMT+12">(GMT-12:00) International Date Line West</option>
<option value="Pacific/Samoa">(GMT-11:00) Midway Island, Samoa</option>
<option value="HST">(GMT-10:00) Hawaii</option>
<option value="America/Anchorage">(GMT-09:00) Alaska</option>
<option value="PST">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
<option value="MST">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
<option value="America/Chihuahua">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
<option value="America/Phoenix">(GMT-07:00) Arizona</option>
<option value="America/Regina">(GMT-06:00) Saskatchewan</option>
<option value="America/Mexico_City">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
<option value="America/Chicago">(GMT-06:00) Central Time (US &amp; Canada)</option>
<option value="America/Costa_Rica">(GMT-06:00) Central America</option>
<option value="America/Indiana/Vincennes">(GMT-05:00) Indiana (East)</option>
<option value="EST">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
<option value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
<option value="America/Caracas">(GMT-04:30) Caracas</option>
<option value="America/Santiago">(GMT-04:00) Santiago</option>
<option value="America/Manaus">(GMT-04:00) Manaus</option>
<option value="America/La_Paz">(GMT-04:00) La Paz</option>
<option value="America/Halifax">(GMT-04:00) Atlantic Time (Canada)</option>
<option value="America/St_Johns">(GMT-03:30) Newfoundland</option>
<option value="America/Montevideo">(GMT-03:00) Montevideo</option>
<option value="America/Godthab">(GMT-03:00) Greenland</option>
<option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires</option>
<option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
<option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
<option value="Atlantic/Azores">(GMT-01:00) Azores</option>
<option value="Africa/Casablanca">(GMT) Casablanca</option>
<option value="GMT">(GMT) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
<option value="Atlantic/Reykjavik">(GMT) Monrovia, Reykjavik</option>
<option value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
<option value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
<option value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
<option value="Europe/Sarajevo">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
<option value="Africa/Kinshasa">(GMT+01:00) West Central Africa</option>
<option value="Asia/Amman">(GMT+02:00) Amman</option>
<option value="Europe/Athens">(GMT+02:00) Athens, Bucharest, Istanbul</option>
<option value="Asia/Beirut">(GMT+02:00) Beirut</option>
<option value="Africa/Cairo">(GMT+02:00) Cairo</option>
<option value="Africa/Harare">(GMT+02:00) Harare, Pretoria</option>
<option value="Europe/Helsinki">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
<option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
<option value="Europe/Minsk">(GMT+02:00) Minsk</option>
<option value="Africa/Windhoek">(GMT+02:00) Windhoek</option>
<option value="Asia/Baghdad">(GMT+03:00) Baghdad</option>
<option value="Asia/Kuwait">(GMT+03:00) Kuwait, Riyadh</option>
<option value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
<option value="Africa/Nairobi">(GMT+03:00) Nairobi</option>
<option value="Asia/Tbilisi">(GMT+03:00) Tbilisi</option>
<option value="Asia/Tehran">(GMT+03:30) Tehran</option>
<option value="Asia/Dubai">(GMT+04:00) Abu Dhabi, Muscat</option>
<option value="Asia/Baku">(GMT+04:00) Caucasus Standard Time</option>
<option value="Indian/Mauritius">(GMT+04:00) Port Louis</option>
<option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
<option value="Asia/Kabul">(GMT+04:30) Kabul</option>
<option value="Asia/Yekaterinburg">(GMT+05:00) Ekaterinburg</option>
<option value="Asia/Karachi">(GMT+05:00) Islamabad, Karachi</option>
<option value="Asia/Tashkent">(GMT+05:00) Tashkent</option>
<option value="IST">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
<option value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
<option value="Asia/Novosibirsk">(GMT+06:00) Almaty, Novosibirsk</option>
<option value="Asia/Dacca">(GMT+06:00) Astana, Dhaka</option>
<option value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)</option>
<option value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
<option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
<option value="Asia/Chongqing">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
<option value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
<option value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala Lumpur, Singapore</option>
<option value="Australia/Perth">(GMT+08:00) Perth</option>
<option value="Asia/Taipei">(GMT+08:00) Taipei</option>
<option value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
<option value="Asia/Seoul">(GMT+09:00) Seoul</option>
<option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
<option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
<option value="Australia/Darwin">(GMT+09:30) Darwin</option>
<option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
<option value="Australia/Sydney">(GMT+10:00) Canberra, Melbourne, Sydney</option>
<option value="Pacific/Guam">(GMT+10:00) Guam, Port Moresby</option>
<option value="Australia/Hobart">(GMT+10:00) Hobart</option>
<option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
<option value="Pacific/Noumea">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
<option value="NST">(GMT+12:00) Auckland, Wellington</option>
<option value="Pacific/Fiji">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
<option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                    </select>
                </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="btnLookupHistory">&nbsp</label>
                        <button id="btnLookupHistory" class="form-control btn btn-primary" role="button">
                            <i class="fa fa-search" aria-hidden="true"></i> Lookup
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Details</td>
                                <td>Start Date / Time</td>
                                <td>End Date / Time</td>
                                <td>Callers</td>
                                <td>Duration</td>
                                <td>Total Minutes</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="fa fa-table fa-2x" aria-hidden="true"></i></td>
                                <td>January 1, 1990</td>
                                <td>January 1, 1990</td>
                                <td>100</td>
                                <td>1231</td>
                                <td>1231</td>
                                <td>
                                    <i class="fa fa-tag fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-file-audio-o fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-table fa-2x" aria-hidden="true"></i></td>
                                <td>January 1, 1990</td>
                                <td>January 1, 1990</td>
                                <td>100</td>
                                <td>1231</td>
                                <td>1231</td>
                                <td>
                                    <i class="fa fa-tag fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-file-audio-o fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-table fa-2x" aria-hidden="true"></i></td>
                                <td>January 1, 1990</td>
                                <td>January 1, 1990</td>
                                <td>100</td>
                                <td>1231</td>
                                <td>1231</td>
                                <td>
                                    <i class="fa fa-tag fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-file-audio-o fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Start of Settings tab -->
        <div role="tabpanel" class="tab-pane" id="settings">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="b_pin">PIN</label>
                        <input class="form-control" type="text" id="b_pin" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="b_confMode">Conference Mode</label>
                        <select class="form-control" id="b_confMode">
                            <option value="qa">Question &amp; Answer</option>
                            <option value="conversation">Conversation</option>
                            <option value="presentation">Presentation</option>
                            <option value="hostsOnly">Hosts Only</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <span class="comment lblNoteStyle1">Defines speaking privileges during conference</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="b_confStart">Conference Start</label>
                        <select class="form-control" id="b_confStart">
                            <option value="instant">When 2nd caller joins</option>
                            <option value="hostJoins">When host joins</option>
                            <option value="hostConfirms">When host confirms</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <span class="comment lblNoteStyle1">When participants are placed into an active conference</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="b_confEnd">Conference End</label>
                        <select class="form-control" id="b_confEnd">
                            <option value="">When last caller leaves</option>
                            <option value="60000">1 min after host leaves</option>
                            <option value="300000">5 min after host leaves</option>
                            <option value="900000">15 min after host leaves</option>
                            <option value="1800000">30 min after host leaves</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <span class="comment lblNoteStyle1">When an active conference ends</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="b_entryChimes">Entry Notice</label>
                        <select class="form-control" id="b_entryChimes">
                            <option value="chime">Chime</option>
                            <option value="name">Name</option>
                            <option value="none">None</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <span class="comment lblNoteStyle1">Audible alert indicating when a new participant joins</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="b_exitChimes">Exit Notice</label>
                        <select class="form-control" id="b_exitChimes">
                            <option value="chime">Chime</option>
                            <option value="name">Name</option>
                            <option value="none">None</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <span class="comment lblNoteStyle1">Audible alert indicating when a participant leaves</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="b_recordCalls">Record Conferences</label>
                        <select class="form-control" id="b_recordCalls">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <span class="comment lblNoteStyle1">Records the conference (downloadable .mp3 file)</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="b_recordName">Prompt Callers for Name</label>
                        <select class="form-control" id="b_recordName">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <span class="comment lblNoteStyle1">Prompts callers to record their name upon arrival</span>
                        <button id="btnHelp_recordName" class="btnHelp btnImg"></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="b_announceCount">Announce Caller Count</label>
                        <select class="form-control" id="b_announceCount">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <span class="comment lblNoteStyle1">Tells new entrants how many callers are in the conference</span>
                    <</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="b_musicOnHold">Music on Hold</label>
                        <select class="form-control" id="b_musicOnHold">
                            <option value="music">Yes</option>
                            <option value="beep">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <span class="comment lblNoteStyle1">Plays prior to conference start</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="b_blockUnlisted">Participant Access</label>
                        <select class="form-control" id="b_blockUnlisted">
                            <option value="0">Allow all participants</option>
                            <option value="1">Only allow participants in Caller List</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <span class="comment lblNoteStyle1">Requires callers to be pre-registered in the Caller List</span>
                        <button id="btnHelp_blockUnlisted" class="btnHelp btnImg"></button>
                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="b_timezone">Time Zone</label>
                        <select class="form-control" id="b_timezone">
                            <option value="Etc/GMT+12">(GMT-12:00) International Date Line West</option>
<option value="Pacific/Samoa">(GMT-11:00) Midway Island, Samoa</option>
<option value="HST">(GMT-10:00) Hawaii</option>
<option value="America/Anchorage">(GMT-09:00) Alaska</option>
<option value="PST">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
<option value="MST">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
<option value="America/Chihuahua">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
<option value="America/Phoenix">(GMT-07:00) Arizona</option>
<option value="America/Regina">(GMT-06:00) Saskatchewan</option>
<option value="America/Mexico_City">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
<option value="America/Chicago">(GMT-06:00) Central Time (US &amp; Canada)</option>
<option value="America/Costa_Rica">(GMT-06:00) Central America</option>
<option value="America/Indiana/Vincennes">(GMT-05:00) Indiana (East)</option>
<option value="EST">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
<option value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
<option value="America/Caracas">(GMT-04:30) Caracas</option>
<option value="America/Santiago">(GMT-04:00) Santiago</option>
<option value="America/Manaus">(GMT-04:00) Manaus</option>
<option value="America/La_Paz">(GMT-04:00) La Paz</option>
<option value="America/Halifax">(GMT-04:00) Atlantic Time (Canada)</option>
<option value="America/St_Johns">(GMT-03:30) Newfoundland</option>
<option value="America/Montevideo">(GMT-03:00) Montevideo</option>
<option value="America/Godthab">(GMT-03:00) Greenland</option>
<option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires</option>
<option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
<option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
<option value="Atlantic/Azores">(GMT-01:00) Azores</option>
<option value="Africa/Casablanca">(GMT) Casablanca</option>
<option value="GMT">(GMT) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
<option value="Atlantic/Reykjavik">(GMT) Monrovia, Reykjavik</option>
<option value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
<option value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
<option value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
<option value="Europe/Sarajevo">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
<option value="Africa/Kinshasa">(GMT+01:00) West Central Africa</option>
<option value="Asia/Amman">(GMT+02:00) Amman</option>
<option value="Europe/Athens">(GMT+02:00) Athens, Bucharest, Istanbul</option>
<option value="Asia/Beirut">(GMT+02:00) Beirut</option>
<option value="Africa/Cairo">(GMT+02:00) Cairo</option>
<option value="Africa/Harare">(GMT+02:00) Harare, Pretoria</option>
<option value="Europe/Helsinki">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
<option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
<option value="Europe/Minsk">(GMT+02:00) Minsk</option>
<option value="Africa/Windhoek">(GMT+02:00) Windhoek</option>
<option value="Asia/Baghdad">(GMT+03:00) Baghdad</option>
<option value="Asia/Kuwait">(GMT+03:00) Kuwait, Riyadh</option>
<option value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
<option value="Africa/Nairobi">(GMT+03:00) Nairobi</option>
<option value="Asia/Tbilisi">(GMT+03:00) Tbilisi</option>
<option value="Asia/Tehran">(GMT+03:30) Tehran</option>
<option value="Asia/Dubai">(GMT+04:00) Abu Dhabi, Muscat</option>
<option value="Asia/Baku">(GMT+04:00) Caucasus Standard Time</option>
<option value="Indian/Mauritius">(GMT+04:00) Port Louis</option>
<option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
<option value="Asia/Kabul">(GMT+04:30) Kabul</option>
<option value="Asia/Yekaterinburg">(GMT+05:00) Ekaterinburg</option>
<option value="Asia/Karachi">(GMT+05:00) Islamabad, Karachi</option>
<option value="Asia/Tashkent">(GMT+05:00) Tashkent</option>
<option value="IST">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
<option value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
<option value="Asia/Novosibirsk">(GMT+06:00) Almaty, Novosibirsk</option>
<option value="Asia/Dacca">(GMT+06:00) Astana, Dhaka</option>
<option value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)</option>
<option value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
<option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
<option value="Asia/Chongqing">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
<option value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
<option value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala Lumpur, Singapore</option>
<option value="Australia/Perth">(GMT+08:00) Perth</option>
<option value="Asia/Taipei">(GMT+08:00) Taipei</option>
<option value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
<option value="Asia/Seoul">(GMT+09:00) Seoul</option>
<option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
<option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
<option value="Australia/Darwin">(GMT+09:30) Darwin</option>
<option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
<option value="Australia/Sydney">(GMT+10:00) Canberra, Melbourne, Sydney</option>
<option value="Pacific/Guam">(GMT+10:00) Guam, Port Moresby</option>
<option value="Australia/Hobart">(GMT+10:00) Hobart</option>
<option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
<option value="Pacific/Noumea">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
<option value="NST">(GMT+12:00) Auckland, Wellington</option>
<option value="Pacific/Fiji">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
<option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="b_notificationList">Notification List</label>
                        <textarea class="form-control" id="b_notificationList"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <span class="comment lblNoteStyle1">List of email addresses to receive email reports (separate by comma)</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button id="btnSave" class="btn btn-primary" role="button">Save</button>
                    <button class="btn btn-primary"  role="button">Cancel</button>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="stream">
            <h3>Coming Soon</h3>
        </div>
    </div>

</div>




    @else
        {{ htmlspecialchars($error) }}
    @endif

    </div>
@endsection

@section('javascript')
        var bridgeDefaultTimezone = '{{$data->bridge_details->timezone}}';
        var bridgeConferenceID = '{{$data->bridge_details->conferenceID}}';
        var bridgeHostPin = '{{$data->bridge_details->pin}}';
        var bridgeName = '{{ $data->bridge_details->name }}';
        var bridgeTollNumberFormatted = '{{ $data->bridge_details->tollNumberFormatted }}';
        var bridgeTollFreeNumberFormatted = '{{$data->bridge_details->tollFreeNumberFormatted}}';
        //var streamEnabled = FALSE;
        var streamID = '';
        var streamPassword = '';

        $( document ).ready(function() {
            console.log( "ready!" );
            $("#bridgeTollFreeNumberFormatted").text(bridgeTollFreeNumberFormatted);
            $("#bridgeTollNumberFormatted").text(bridgeTollNumberFormatted);
            $("#bridgeName").text(bridgeName);
            $("#bridgeConferenceID").text(bridgeConferenceID);
            $("#bridgeHostPin").text(bridgeHostPin);
            $("#bridgeTollFreeNumberFormatted").text(bridgeTollFreeNumberFormatted);
            $("#timezoneSelect").val(bridgeDefaultTimezone);
             $('#endedDate').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
             $('#startedDate').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });
@endsection
