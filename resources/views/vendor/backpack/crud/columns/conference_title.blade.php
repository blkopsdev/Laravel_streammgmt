{{-- single relationships (1-1, 1-n) --}}
<td>
  @if ($entry->{$column['entity']})
    {{ $entry->{$column['entity']}->{'name'} }} - {{ $entry->{$column['entity']}->{'conference_id'} }} 
  @endif
</td>
