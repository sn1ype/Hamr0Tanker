@extends('admin.dashboard')
@section('content')
    

@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
<div class="container-fluidr">
  <div class="col-sm-12">
    <div class="col-sm-12">
      <div class="white-box">
  <form action="/slider" method="POST">
    <div class="form-group">
        @csrf
        @error('title')
        <div class="alert alert-danger">Please Fill ALL</div>
        @enderror
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name" required>
      
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email" name="email" required>
    </div>
    <br>
      
    <button type="submit" class="btn btn-primary">Create User</button>
  </form>
      </div>
    </div>
  </div>
</div>
@endsection