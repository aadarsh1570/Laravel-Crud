<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center mb-4">Student Details</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{url('register')}}" class="btn btn-success">ADD NEW USER</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PASSWORD</th>
                    <th scope="col">MOBILE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $stu)
                <tr>
                    <td>{{$stu->id}}</td>
                    <td>{{$stu->name}}</td>
                    <td>{{$stu->email}}</td>
                    <td>{{$stu->password}}</td>
                    <td>{{$stu->mobile}}</td>
                    <td>
            
                        <a href="" class="btn btn-info btn-sm">VIEW</a>
                        <!-- <a href="{{$stu->id}}/update" class="btn btn-warning btn-sm">UPDATE</a> -->
                        <form action="{{ $stu->id }}/update" style="display: inline;" method="POST">
    @csrf
    @method('PUT')
    <!-- Input fields for updating the student -->
    <!-- <button type="submit" class="btn btn-primary">UPDATE</button> -->
     <a href=" {{ url($stu->id.'/edit') }}" class="btn btn-primary">UPDATE</a>

</form>

                        <a href="{{$stu->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">DELETE</a>



                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
