@extends('layouts.app')

@section('header')

    <center><h3>Traffic Report</h3></center>
    <center><h4>X Company</h4></center>

    <br>
    <br>
    <br>

    <div class="container">
        <div class="row" style="max-width: 100%">
            <div class="col-md-2" style="float: right; margin-right: -110px">
                <select class="form-control" id="month">
                  <option selected="" disabled="true">Pick One</option>
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">Jule</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
            </div>
            <div class="col-md-2" style="float: right; margin-right: -60px">
                <h4>Choose Month</h4>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <center><div id="user_agent" style="width: 1300px; height: 500px"></div>

    <br>
    <br>

    <div class="row">
        <div class="col-md-6 mr-auto" style="margin-left: 25px; margin-right: 15px">
            <div id="url" style="height: 500px;"></div>
        </div>

        <div class="col-md-5" style="width: 625px">
            <div id="http_host" style="height: 500px;"></div>
        </div>
    </div>

@endsection

@section('footer')

<br>
    <form method="post" action="{{ url('/mail/send') }}">
      {{ csrf_field() }}
        <button type="submit" class="btn btn-primary btn-lg btn-block">Send Mail</button>
    </form>

    <script type="text/javascript">
    @if ($month)
      window.history.pushState("string", "Report Traffic X Company", "{{ url('/') }}");
      $(function() {
        $("#month").val("{{ $month }}").change();
      });
    @endif

    $(function() {
      $("#month").change(function() {
        $(location).attr('href', '{{ url('') }}/' + $(this).val());
      });
    });
  </script>

@endsection
