<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
    <div class="container">
    {{-- <form action="/post" method="POST">
        @csrf

        @error('title')
        <div class="alert alert-danger">Please enter the title</div>
        @enderror

        Name:<input type="text" name="name"><br>
        Description: <input type="text" name="desc" ><br>
        Price: <input type="number" name="price" ><br>
        Capacity: <input type="text" name="capacity" ><br>
        <button class="btn btn-primary">Add Tanker</button>
    </form> --}}
    <form action="/user" method="POST">
        <div class="form-group">
            @csrf
            @error('title')
            <div class="alert alert-danger">Please Fill ALL</div>
            @enderror
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email" name="email">
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
</body>
</html>