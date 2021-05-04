@extends('admin.dashboard')
@section('content')
    

@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
    <div class="container">
    <form action="/userstable/{{$data->id}}" method="POST">
        @csrf
        @error('title')
        <div class="alert alert-danger">Please enter the title</div>
        @enderror

        Name:<input type="text" name="name" value="{{$data->name}}"><br>
        Email: <input type="email" name="email" value="{{$data->email}}"><br>
        Role: <input type="text" name="role" value="{{$data->role}}"><br>
        <button class="btn btn-success">Edit Post</button>
    </form>
    </div>
    @endsection