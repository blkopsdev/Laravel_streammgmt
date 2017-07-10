<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body bgcolor="#ffffff" text="#000000">

<!-- DO NOT EDIT OR REMOVE THIS LINE - SKIN ID: wholesale -->
<style type="text/css">
<!--
.style5 {
    font-family: Trebuchet, Trebuchet MS;
    font-size: 11px;
    font: bold 11px Trebuchet, Trebuchet MS;
    color: #666666;
}
.label {font-weight: bold;
    padding-right: 10px;
}
.h1 { font-size: 120%; }

.h4 { font-size: 100%; font-weight: bold; }

ul { list-style: disc inside; padding-left: 0;
    margin-left: 0; }

ul.number { list-style: decimal inside; }

ul.none { list-style: none inside; }

-->
</style>
<style>
hr {color:#2b648f; border: dashed 1px #2b648f; border-width: 0px 0px 1px 0px; margin:5px 0px 5px 0px; clear:both;}
a:link, a:active, a:visited {color:#2b648f;}
</style>

<table width="100%" align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
 <tbody>
  <tr>
   <td colspan="3" valign="top" align="center">

<!-- BEGIN HEADER -->
   <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tbody>
     <tr>
      <td width="20"></td>
      <td valign="bottom" width="480" align="left">
       <span style="color:#31009c; font-family: Trebuchet,Trebuchet MS, sans-serif; font-style: normal; font-variant: normal; font-weight: bold; font-size: 28px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;">
       Conference Summary Report </span><br/><br/>
       <span style="color:#4a4344; font-family: Trebuchet,Trebuchet MS, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;">
       Thank you for using the Aleph Communications conferencing service.  The details for your conference call are shown below.</span>
       <br/>&nbsp;<br/>
      </td>
      <td valign="bottom" width="auto" align="right"><img src="http://conference.aleph-com.net/custom/aleph/images/aleph-logo.jpg" alt="Aleph" ><br/>&nbsp;</td>
      <td valign="bottom" width="20" align="left"></td>
     </tr>

     <tr bgcolor="31009c">
      <td colspan="4" style="padding:0px;margin:0px;margin-auto:0px;mso-line-height-rule: exactly;line-height:10px;">&nbsp;</td>
     </tr>
     <tr bgcolor="9cce31">
      <td colspan="4" style="padding:0px;margin:0px;margin-auto:0px;mso-line-height-rule: exactly;line-height:5px;">&nbsp;</td>
     </tr>

    </tbody>
  </table>

<!-- END HEADER -->
  </td>
 </tr>
 <tr>
  <td width="20"></td>
  <td valign="top" width="auto" align="left"><br/><br/>
<!-- BEGIN RES PLUS SECTION -->
   <table width="auto" border="0" cellpadding="0" cellspacing="0">
    <tbody>
     <tr>
      <td valign="top" width="auto" align="left" height="45">
       <span style="font-family: Trebuchet,Trebuchet MS; font-style: normal; font-variant: normal; font-weight: bold; font-size: 14px; line-height: 22px; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color:#000000;">
       <?php echo $bridge_details->name; ?></span><br/><br/>
       <span style="font-family: Trebuchet,Trebuchet MS; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: 18px; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color:#4a4344;">
        <span style="font-weight: bold; padding-right: 10px;">Conference ID:</span>&nbsp; <?php echo $conference_cdr->conferenceCDR[0]->conferenceID; ?><br/>
        <span style="font-weight: bold; padding-right: 10px;">Conference began:</span>&nbsp; <?php echo $conference_cdr->conferenceCDR[0]->startedDate; ?><br/>
        <span style="font-weight: bold; padding-right: 10px;">Conference duration:</span>&nbsp; <?php echo $conference_cdr->conferenceCDR[0]->totalSeconds; ?><br/>
       </span>
      </td>
     </tr>
    </tbody>
   </table>
<!-- END RES PLUS SECTION -->
   <p style="padding-top:10px;">
   <span style="font-family: Trebuchet,Trebuchet MS; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color: rgb(0, 0, 0);">
   <strong><em>Peak participants in the conference: &nbsp;<?php echo $conference_cdr->conferenceCDR[0]->peakParticipants; ?></em></strong>
   </p>
   <p style="padding-top:10px;">
   <span style="font-family: Trebuchet,Trebuchet MS; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color: rgb(0, 0, 0);">
   <strong><em>Total participants in the conference: &nbsp;<?php echo $conference_cdr->conferenceCDR[0]->participants; ?></em></strong>
   </p>
   <table width="100%" border="0" cellpadding="4" cellspacing="0">
    <thead>
     <tr bgcolor="#f4f8fa">
      <td width="25%" style="border-top: 1px solid #31009c;" valign="middle" align="left">
       <span style="font-family: Trebuchet,Trebuchet MS; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color: #31009c;">
       Caller ID</span></td>
      <td width="25%" style="border-top: 1px solid #31009c;" valign="middle" align="left">
       <span style="font-family: Trebuchet,Trebuchet MS; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color: #31009c;">
       Location</span></td>
           <td width="20%" style="border-top: 1px solid #31009c;" valign="middle" align="left">
       <span style="font-family: Trebuchet,Trebuchet MS; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color: #31009c;">
       Caller Name</span></td>
           <td width="10%" style="border-top: 1px solid #31009c;" valign="middle" align="left">
       <span style="font-family: Trebuchet,Trebuchet MS; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color: #31009c;">
       Host?</span></td>
      <td width="10%" style="border-top: 1px solid #31009c;" valign="middle" align="left">
       <span style="font-family: Trebuchet,Trebuchet MS; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color: #31009c;">
       Time Joined</span></td>
      <td width="10%" style="border-top: 1px solid #31009c;" valign="middle" align="left">
       <span style="font-family: Trebuchet,Trebuchet MS; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color: #31009c;">
       Minutes</span></td>
     </tr>
    </thead>
    <tbody>
        <?php foreach ($call_cdr->conferenceCallCDR AS $cdr) {?>
        <tr style="font-family: Trebuchet, Trebuchet MS, Arial;font-size: 11px;font: normal 11px Trebuchet, Trebuchet MS, Arial;color: #666666;">
      <td><?php echo $cdr->fromNumberFormatted; ?></td>
      <td><?php echo $cdr->location; ?></td>
             <td><?php echo $cdr->fromName; ?></td>
            <td>&nbsp;</td>
      <td><?php echo $cdr->callStartedDate; ?></td>
      <td>1 min</td>
     </tr>
        <?php } ?>
     </tbody>
   </table>


   

   <table width="auto" border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <?php if ($conference_cdr->conferenceCDR[0]->recordingURL != '') { ?>
     <tr>
         <td valign="top" width="100%" align="left">
       <p style="padding-top:15px; margin-top:15px; font-family: Trebuchet,Trebuchet MS, Arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color:#646060;">
         Portions of this conference call were recorded.</p>
         </td>
     </tr>
     <tr>
        <td valign="top" width="100%" align="left">
       <p style="padding-top:15px; margin-top:15px; font-family: Trebuchet,Trebuchet MS, Arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color:#646060;">
       <a href="http://api.aleph-com.net/api/conference/transcription/order/<?php echo $conference_cdr->conferenceCDR[0]->totalSeconds; ?>/<?php echo base64_encode($conference_cdr->conferenceCDR[0]->recordingURL); ?>/<?php echo $bridge_details->conferenceID; ?>/<?php echo $conference_cdr->conferenceCDR[0]->cdrID; ?>/<?php echo base64_encode($conference_cdr->conferenceCDR[0]->startedDate); ?>">Order Transcription</a></p>
      </td>
     </tr>
     <tr>
      <td valign="top" width="10%" align="left">
       <p style="padding-top:15px; margin-top:15px; font-family: Trebuchet,Trebuchet MS, Arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color:#646060;">
       <a href="http://api.aleph-com.net/api/conference/recording/distribute/<?php echo base64_encode($conference_cdr->conferenceCDR[0]->recordingURL); ?>/<?php echo $conference_cdr->conferenceCDR[0]->conferenceID; ?>/<?php echo $conference_cdr->conferenceCDR[0]->cdrID; ?>/<?php echo base64_encode($conference_cdr->conferenceCDR[0]->startedDate); ?>">Make Recording Available to Listen Via Telephone</a></p>
      </td>
     </tr>
     <?php } ?>
     <tr>
      <td valign="top" width="100%" align="left">
       <p style="padding-top:15px; margin-top:15px; font-family: Trebuchet,Trebuchet MS, Arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none; color:#646060;">
       If you have any questions about this service or this summary, please contact us at <a href="mailto:conference@aleph-com.net">conference@aleph-com.net</a>.</p>
      </td>
     </tr>
    </tbody>
   </table>
   <br/>
  </td>
  <td width="20"></td>
 </tr>
 </tbody>
</table>
</body>
</html>