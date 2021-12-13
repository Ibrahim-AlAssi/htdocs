<?php

use App\Http\Controllers\prodectcontroller;
$total= 0;
if(Auth::check()){
  $total= prodectcontroller::cart();
}
  
?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="nav-link active" aria-current="page" href="/">Ecom</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">

            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/myorders">order</a>
          </li>
          

         
        </ul>
        <form action="/search" method="GET" class="d-flex">
          <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <ul class="dropdown-menu">
          <li><a href="#">Normal</a></li>
          <li class="disabled"><a href="#">Disabled</a></li>
          <li class="active"><a href="#">Active</a></li>
          <li><a href="#">Normal</a></li>
        </ul>
        
            
          
        
        <ul class="nav navbar -nav navbar-right">
         
          
        <li><a href="/cartlist">CART({{$total}})</a></li>
        <ul class="nav navbar-nav navbar-right">
          @if(Auth::check())
              
         
            <li><a href="/logout"><span class="glyphicon glyphicon-user"></span> logout</a></li>     
            <li><a href="#"><span class="glyphicon glyphicon-user"> {{ Auth::user()->name }}</a></li>  

        
              
          @else
          <li><a href="/register"><span class="glyphicon glyphicon-user"></span> SignUp</a></li>
          <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          @endif
        </ul>
        
        
        
        </ul>
      </div>
    </div>
  </nav>

