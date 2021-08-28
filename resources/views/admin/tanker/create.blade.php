@extends('admin.dashboard')
@section('content')
    

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="white-box">
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
    <div class="container">
  
    <form action="/admin/tanker" method="POST" enctype='multipart/form-data'>
        <div class="form-group">
            @csrf
            @error('title')
            <div class="alert alert-danger">Please enter Name</div>
            @enderror
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name" required>
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Description Here" name="desc" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Tanker Price" name="price" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Capacity</label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Tanker Capacity" name="capacity" required>
          </div><br>
          <div class="form-group">
            <label for="exampleInputPassword1">Capacity</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Water Source" name="water_source" required>
          </div><br>
          <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input type="file" class="form-control"   name="image">
          </div><br>
        <button type="submit" class="btn btn-primary">Add Tanker</button>
      </form>
      <form action="/admin/tanker">
      <div style="margin-top:10px"><button type="submit" style="width: 100px" class="btn btn-danger">Cancel</button></a></div>
    </div></form>
      
    </div>
    </div>
    </div>
  </div>
</div>
    @endsection