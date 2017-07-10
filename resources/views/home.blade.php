@extends('layouts.app')

@section('content')
<div class="container" id="rootContainer">
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Request Access to Stream</div>

        <div class="panel-body">
              <input type="text"  class="form-control" placeholder="Bridge ID">
              <input class="btn btn-default" type="button" name="btnRequestAccess" value="Submit Request">
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">My Streams</div>

        <div class="panel-body">
              <p>Lakeland</p>
              <p>Montezuma</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">News</div>

        <div class="panel-body">
          <p>Welcome to the new system.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">My Phone Numbers</div>

        <div class="panel-body">

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript')
  <script>



  </script>
@endsection
