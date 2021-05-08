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
    <th style="width: 40px;text-align:center;">ID</th>
    <th style="width: 40px;text-align:center;">Name</th>
    <th style="width: 40px;text-align:center;">Price</th>
    <th style="width: 40px;text-align:center;">Capacity</th>
    <th style="width: 40px;text-align:center;">Image</th>
    <th style="width: 40px;text-align:center;"></th>
    <th colspan="3">Actions</th>
</tr>
@foreach ($tankers as $post )
    <tr>
        <td style="width: 40px;text-align:center;">{{$post->id}}</td>
        <td style="width: 40px;text-align:center;">{{$post->name}}</td>
       
        <td style="width: 40px;text-align:center;">{{$post->price  }}</td>
        <td style="width: 40px;text-align:center;">{{$post->capacity}}</td>
        <td style="width: 40px;text-align:center;">{{$post->image}}</td>
        <td style="width: 40px;text-align:center;"></td>
        <td style="width: 40px;text-align:center;"><a href="/tanker/{{$post->id}}/edit"><button class="btn btn-info">Edit</button></a></td>
        <form method="POST" action="/tanker/{{$post->id}}">
        @csrf
        @method('delete')
        <td><input class="btn btn-warning" type="submit" value="Delete"></td>
        </form>
      


    </tr>
@endforeach

</table>
<a href="/tanker/create" class="btn btn-primary" >Add Tanker</a>
            </div>
        </div>
    </div>
</div>
@endsection