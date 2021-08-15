@extends('master')
@section('content')

<div class="container">
<form action="/myorders/{tanker_id}" method="POST">
  @csrf
  <div class="form-group">
    <label for="pwd">User's Name : {{$user->name}} @if($user['verified']=='2')<img style='width: 20px;height:20px' title="Verified" src='{{asset("/images/badges/admin.png")}}'/>@endif</label>
  <input type="text" name="user_name" value="{{$user->name}}" id="" hidden>
  </div>
    <div class="form-group">
      <label for="email">Tanker Capacity : </label>
      <input type="text" name="capacity" value="{{$data->capacity}}" readonly>
    </div>
    <div class="form-group">
      <label for="pwd">Tanker Price :</label>
      <input type="text" name="price" value="{{$data->price}}" readonly>
    </div>
      <div class="form-group">
        <label for="pwd">Address</label><span> <i>only available inside valley right now </i></span>
        <input type="text"  class="form-control" name="address" id="pwd" required>
      </div>
      <div class="form-group">
        <label for="pwd">Street</label>
        <input type="text"  class="form-control" name="street" id="pwd" required>
      </div>
      <div class="form-group">
        <label for="pwd">Phone Number</label>
        <input type="number"  class="form-control" name="number" maxlength="10" minlength="10" id="pwd" required>
      </div>
      <div class="form-group">
        <input type="text"  class="form-control" name="status" value="pending" id="pwd" hidden>
      </div>
      

    <div class="checkbox">
      
      <label><input name="payment" value="payment" type="radio" checked> Cash on delivery </label>
    </div>
    <input type="text" name="tanker_id" value="{{$data->id}}" id="" hidden>
    <input type="text" name="tanker_name" value="{{$data->name}}" id="" hidden>
    <input type="text" name="user_id" value="{{$user->id}}" id="" hidden>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
@endsection