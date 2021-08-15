@extends('master')
@section('content')
@if (session('status'))
<div style="height: 50px;font-size:30px" class="alert alert-danger">
  <center>  {{ session('status') }} </center>
</div>
@endif
<div style="height: 400px" class="container">
    <div class="row">
        <div style="text-align: center;margin:auto" class="column">
           <br><br><br><br><br> <p  style="font-size:40px;text-align:center"> Nothing to show here</p><br>
              <p style="font-size: 70px">  ☹</p>
        </div>
    </div>
</div>
@endsection