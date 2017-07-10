@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
                </div>

                <div class="box-body">{{ trans('backpack::base.logged_in') }}</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Icecast</div>
                </div>

                <div class="box-body">
                  <p>Current Listeners: {{ $icecast['listeners']}}</p>
                  <p>Sources: {{ $icecast['sources'] }}</p>
                  <p>Server Start: {{ $icecast['server_start']}}</p>
                  <ul>
                    @foreach($icecast_mounts as $mount)
                      <li>
                        @if($mount['listeners'] == 0)
                          {{ $mount['mount_id'] }} <span class="label label-default">0</span>
                        @else
                          {{ $mount['mount_id'] }} <span class="label label-primary">{{ $mount['listeners'] }}</span>
                        @endif
                        {{ $mount['description'] }}
                        <br>
                        @include('admin.stream_percentage')
                      </li>
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Conference Bridges</div>
                </div>

                <div class="box-body">
                  <ul>
                    @foreach($conferences as $c)
                      <li>{{ $c->conference_id }} - {{ $c->name }} - {{ $c->current_status }} - {{ $c->current_participants }} - {{ $c->peak_participants }}</li>
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
