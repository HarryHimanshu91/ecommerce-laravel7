@extends('master')
@section('content')
<div class="container custom-login">


    <div class="row">
        <div class="col-md-4 col-sm-offset-4">

       

            <form action="{{ route('login') }}" method="post">
              @csrf 
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password" id="pwd" required>
                </div>
               
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection