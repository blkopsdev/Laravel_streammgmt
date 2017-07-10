<div class="progress">
  <div class="progress-bar progress-bar-{{ $mount['progress_bar'] }} progress-bar-striped" role="progressbar" aria-valuenow="{{ $mount['listeners'] }}" aria-valuemin="0" aria-valuemax="{{ $mount['max_listeners'] }}" style="width: {{ $mount['percentage'] }}%">
    <span class="sr-only">{{ $mount['percentage'] }}% Full</span>
  </div>
</div>
