@extends('admin.dashboard')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Registred Users</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Role</th>
                                            <th colspan="3" class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $post )
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->name}}</td>
                                            <td>{{$post->email}}</td>
                                            <td><?php if($post['role']=="2") {echo "Admin";} else {echo "User";}?></td>
                                            <td style="width: 40px;"><a href="/userstable/{{$post->id}}/edit"><button class="btn btn-info">Edit</button></a></td>
                                            <form method="POST" action="/userstable/{{$post->id}}">
                                                @csrf
                                                @method('delete')
                                                <td><input class="btn btn-warning" type="submit" value="Delete"></td>
                                                </form>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                                <a href="/userstable/create" class="btn btn-primary" >Create User</a>
                            </div>
                        </div>
                    </div>
                </div>
           
            </div>
          
        </div>
        
    </div>
   @endsection