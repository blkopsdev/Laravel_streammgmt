<include>
  <extension name="public_did">
    @foreach ($dids as $did)
    <condition field="destination_number" expression="^{{ echo preg_replace("/[^0-9]/","",$did->did) }}$|^1{{ preg_replace("/[^0-9]/","",$did->did) }}$">
      @if ($did->audio_level_read <> 0)
      <action application="set_audio_level" data="read {{ $did->audio_level_read }}"/>
      @endif
      @if ($did->audio_level_write <> 0)
      <action application="set_audio_level" data="write {{ $did->audio_level_write }}"/>
      @endif
      @if ($did->bypass_media == 1) {
      <action application="set" data="bypass_media=true"/>
      @endif
      @if ($did->uri != '')
      <action application="bridge" data="sofia/external/{{ $did->uri; ?>"/>
      @elseif ($did->type == 1 )
      <action application="bridge" data="sofia/external/aleph00#{{ $did->conference_id; ?>@turbobridge.com:5060"/>
      @elseif ($did->type == 2 )
      <action application="bridge" data="sofia/external/aleph00#{{ $did->conference_id; ?>*<?php echo $did->host_pin; ?>@turbobridge.com:5060"/>
      @elseif ($did->type == 3 )
      <action application="bridge" data="sofia/external/{{ preg_replace("/[^0-9]/","",$did->did) }}@pbx.aleph-com.net:5060"/>
      @endif
    </condition>
  @endforeach
  </extension>
</include>
