@extends('master')
@section('content')
<div class="container custom-login">


    <div class="row">
        <div class="col-md-4 col-sm-offset-4">

       

            <form action="{{ route('saveUser') }}" method="post">
              @csrf 
                <div class="form-group">
                    <label for="email"> User Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter User Name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Id" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter Password" required>
                </div>
               
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection