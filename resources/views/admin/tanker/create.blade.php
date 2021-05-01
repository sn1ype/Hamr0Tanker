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
    <form action="/post" method="POST" enctype='multipart/form-data'>
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
            <label for="exampleInputPassword1">Image</label>
            <input type="file" class="form-control"   name="image">
          </div><br>
        <button type="submit" class="btn btn-primary">Add Tanker</button>
      </form>
    </div>
</body>
</html>