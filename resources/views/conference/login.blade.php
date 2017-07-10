@extends('conference.layout')

@section('title', 'Page Title')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="https://www.aleph-com.net/wp-content/uploads/2016/05/aleph-com_trans.gif" class="img-responsive" alt="Aleph Logo" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <form>
                        <div class="form-group">
                            <label for="inputConferenceID">Conference ID</label>
                            <input type="text" class="form-control" id="inputConferenceID" placeholder="Conference ID">
                        </div>
                        <div class="form-group">
                            <label for="inputPin">Pin</label>
                            <input type="text" class="form-control" id="inputPin" placeholder="PIN">
                        </div>
                        <a id="loginButton" class="btn btn-default" href="#" role="button">Login</a>
                    </form>
                </div>

            </div>
        </div>
      @endsection

@section('javascript')
    $("#loginButton").click(function () {
        console.log("Attempted Login");
    });
@endsection
