@extends('master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-4-center" >
            
            <form action="/SignUp" method="POST">
                @csrf
                <div class="mb-3">
                  @csrf
                  <label class="form-label">user name</label>
                  <input type="text" name="name" class="form-control" id="name">
                  
                </div>
                <div class="mb-3">
                  @csrf
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                  
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password">
                </div>
                
                <button type="submit" class="btn btn-primary">Register</button>
              </form>
         </div>
    </div>
</div>
@endsection