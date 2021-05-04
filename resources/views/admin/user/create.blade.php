@extends('admin.dashboard')
@section('content')
    

@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif

    <div class="container-fluidr">
      <div class="row">
        <div class="col-sm-12">
          <div class="white-box">
      <form action="/userstable" method="POST">
        <div class="form-group">
            @csrf
            @error('title')
            <div class="alert alert-danger">Please Fill ALL</div>
            @enderror
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name" required>
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email" name="email" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="password">
          </div><br>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="2">
            <label class="form-check-label" for="flexRadioDefault1">
              Admin 
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="1" checked>
            <label class="form-check-label" for="flexRadioDefault2">
              User
            </label>
          </div><br>
          
        <button type="submit" class="btn btn-primary">Create User</button>
      </form>
          </div>
        </div>
      </div>
    </div>


@endsection