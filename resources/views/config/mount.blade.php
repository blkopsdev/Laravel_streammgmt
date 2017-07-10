<!-- {{ $mount->description }} -->
<!-- Alias: {{ $mount->alias }} -->
<!-- Bitrate: {{ $mount->bitrate }} -->
<mount>
  <mount-name>/{{ $mount->mount }}</mount-name>
  <username>source</username>
  <password>{{ $mount->mount_password }}</password>
  <max-listeners>{{ $mount->max_listeners }}</max-listeners>
  <dump-file>/record/{{ $mount->mount }}/%F-%H-%M-%S.mp3</dump-file>
  <burst-size>4096</burst-size>
  <public>0</public>
  <no-yp>0</no-yp>
  <hidden>1</hidden>
  <fallback-mount>/{{ $mount->mount }}fallback</fallback-mount>
  <fallback-override>1</fallback-override>
  <fallback-when-full>1</fallback-when-full>
  @if ($mount->authorize == 0)
    <username>source</username>
    <password>{{ $mount->mount_password }}</password>
  @else
    <authentication type="url">
      <!--action=mount_add&mount=/live&server=icecast.example.org&port=8000 -->
    <option name="mount_add" value="{{ config('app.url ') }}/icecast_control/mount_add"/>
      <!-- action=mount_remove&mount=/live&server=icecast.example.org&port=8000 -->
      <option name="mount_remove" value="{{ config('app.url ') }}/icecast_control/mount_remove"/>
      <!-- action=listener_add&server=icecast.example.org&port=8000&client=1&mount=/live&user=&pass=&ip=127.0.0.1&agent=My%20player -->
      <option name="listener_add" value="{{ config('app.url ') }}/icecast_control/listener_add"/>
      <!-- action=listener_remove&server=icecast.example.org&port=8000&client=1&mount=/live&user=&pass=&duration=3600&ip=127.0.0.1&agent=My%20player -->
      <option name="listener_remove" value="{{ config('app.url ') }}/icecast_control/listener_remove"/>
      <option name="username" value="user"/>
      <option name="password" value="pass"/>
      <option name="auth_header" value="icecast-auth-user: 1"/>
      <option name="timelimit_header" value="icecast-auth-timelimit:"/>
      <option name="headers" value="x-pragma,x-token"/>
      <option name="header_prefix" value="ClientHeader."/>
      <!-- action=stream_auth&mount=/stream.ogg&ip=192.0.2.0&server=icecast.example.org&port=8000&user=source&pass=password&admin=1 -->
      <option name="stream_auth" value="{{ config('app.url ') }}/icecast_control/stream_auth"/>
    </authentication>
  @endif
</mount>
<mount>
  <mount-name>/{{ $mount->mount }}fallback</mount-name>
  <username>source</username>
  <password>Dkw4569!</password>
  <max-listeners>5000</max-listeners>
  <burst-size>65535</burst-size>
  <queue-size>65535</queue-size>
  <public>0</public>
  <hidden>1</hidden>
  <no-yp>0</no-yp>
</mount>
