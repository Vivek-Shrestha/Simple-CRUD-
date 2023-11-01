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
            <form action="" method="post">
                {{csrf_field()}}
    <div class="from-group">
        <label for="full_name">Full Name:
        <a style="color:red;">{{$errors->first('full_name')}}</a>
        </label>
        <input type="text" name="full_name" id="full_name"  value="{{old('full_name')}}" class="form-control">
    
    <div class="from-group">
        <label for="email">Email:
            <a style="color:red;">{{$errors->first('email')}}</a>
        </label>
        <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control">
    </div>

    <div class="from-group">
        <label for="address">Address:
        <a style="color:red;">{{$errors->first('address')}}</a>
        </label>
        <input type="text" name="address" id="address" value="{{old('address')}}" class="form-control"> 
    </div>

    
    <div class="mb-3">
        <label for="phone">Phone:
        <a style="color:red;">{{$errors->first('phone')}}</a>
        </label>
        <input type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control"> 
    </div>

    <div class="from-group">
        <button class="btn btn-success">Add Record</button>
    </div>
  </form>
</div>
        </div>
            <div class="col-md-8">
               
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studentData as $key=>$student)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$student->full_name}}</td> 
                            <td>{{$student->email}}</td>
                            <td>{{$student->address}}</td>
                            <td>{{$student->phone}}</td>
                            <td>
                                <a href="{{route('edit').'/'.$student->id}}" class="btn-sm btn-primary">Edit</a>
                                <a href="{{route('delete').'/'.$student->id}}" class="btn-sm btn-danger">Delete</a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                {{$studentData->links()}}
            </div>
        </div>
   
  
</body>
</html>