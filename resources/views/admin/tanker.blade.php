@extends('admin.dashboard')
@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<table class="table">
<tr>
    <th style="width: 50px;text-align:center;">ID</th>
    <th style="width: 50px;text-align:center;">Name</th>
    <th style="width: 50px;text-align:center;">Price</th>
    <th style="width: 50px;text-align:center;">Capacity</th>
    <th style="width: 50px;text-align:center;">Water Source</th>
    <th style="width: 50px;text-align:center;">Image</th>
    <th style="width: 50px;text-align:center;">Status</th>
    <th style="width: 50px;text-align:center;">Description</th>
    <th colspan="3">Actions</th>
</tr>
@foreach ($data as $post )
    <tr>
        <td style="width: 50px;text-align:center;">{{$post->id}}</td>
        <td style="width: 50px;text-align:center;">{{$post->name}}</td>
       
        <td style="width: 50px;text-align:center;">{{$post->price  }}</td>
        <td style="width: 50px;text-align:center;">{{$post->capacity}}</td>
        <td style="width: 50px;text-align:center;">{{$post->water_source}}</td>
        <td style="width: 50px;text-align:center;">{{$post->image}}</td>
        <td style="width: 50px;text-align:center;">{{$post->status}}</td>
        <td style="width: 50px;text-align:center;">View desc in update page</td>
        <td style="width: 50px;text-align:center;"><form action="/admin/tanker/{{$post->id}}/edit" method="GET"> <input class="btn btn-success" type="submit" value="Update"></form></td>
        <form method="POST" action="/admin/tanker/{{$post->id}}">
        @csrf
        @method('delete')
        <td><input class="btn btn-danger" type="submit" value="Delete"></td>
        </form>
      


    </tr>
@endforeach

</table>
<form method="GET" action="/admin/tanker/create">
   
    <input class="btn btn-primary" type="submit" value="Add Tanker">
    </form>

            </div>
        </div>
    </div>
</div>
@endsection