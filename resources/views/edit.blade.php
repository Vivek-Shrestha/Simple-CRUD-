<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CURD</title>
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Students Record</h1>

                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
                @endif

            </div>
            <div class="col-md-4">
            <form action="{{route('edit-action')}}" method="post">
                @csrf
                <input type="hidden" name="criteria" value="{{$student->id}}" >
    <div class="from-group">
        <label for="full_name">Full Name:
        <a style="color:red;">{{$errors->first('full_name')}}</a>
        </label>
        <input type="text" name="full_name" id="full_name"  value="{{$student->full_name}}" class="form-control">
    
    <div class="from-group">
        <label for="email">Email:
            <a style="color:red;">{{$errors->first('email')}}</a>
        </label>
        <input type="text" name="email" id="email" value="{{$student->email}}" class="form-control">
    </div>

    <div class="from-group">
        <label for="address">Address:
        <a style="color:red;">{{$errors->first('address')}}</a>
        </label>
        <input type="text" name="address" id="address" value="{{$student->address}}" class="form-control"> 
    </div>

    
    <div class="mb-3">
        <label for="phone">Phone:
        <a style="color:red;">{{$errors->first('phone')}}</a>
        </label>
        <input type="text" name="phone" id="phone" value="{{$student->phone}}" class="form-control"> 
    </div>

    <div class="fmb-3">
        <button class="btn btn-success">Update Record</button>
    </div>
  </form>
</div>
         
        </div>
    </div>
  
</body>
</html>