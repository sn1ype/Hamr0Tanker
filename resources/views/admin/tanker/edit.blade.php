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
  
    <form action="/tanker/{{$data->id}}" method="POST" enctype='multipart/form-data'>
        <div class="form-group">
           
            @csrf
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="name" value="{{$data->name}}">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <input type="text" class="form-control" id="exampleInputPassword1"  name="desc" value="{{$data->desc}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="number" class="form-control" id="exampleInputPassword1"  name="price" value="{{$data->price}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Capacity</label>
            <input type="number" class="form-control" id="exampleInputPassword1"  name="capacity" value="{{$data->capacity}}">
          </div><br>
          <div class="form-group">
            <label for="exampleInputPassword1">Previous Image of  {{$data->name}} :<br><span><img style="width: 200px;height:100px" src="{{asset('/images/tanker/'.$data["image"])}}"/></span></label>
            <input type="file" class="form-control" name="image" required>
          </div><br>
        <button type="submit" class="btn btn-success">Update Tanker</button>
      </form>
      <div style="margin-top:10px"><a href="/tanker"><button style="width: 116px" class="btn btn-danger">Cancel</button></a></div>
    </div>
      
    </div>



            </div>
        </div>
    </div>

    @endsection