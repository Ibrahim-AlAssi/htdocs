@extends('master')
@section('content')
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Admin</a>
      </div>
      <ul class="nav navbar-nav">
        
        <li><a href="/addprodect">addproduct</a></li>
        <li><a href="/prodectlist">productlist</a></li>
        <li><a href="/orderhistory">orderhistory</a></li>
        <li><a href="/adminorders">adminorders</a></li>
        
      </ul>
    </div>
  </nav>
    


<div class=" custom-product">
  @if (user() && user()->hasRole('owner|admin')) 
                
                <h1>welcome admin</h1>
 @endif
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          @foreach ($Prodect as $index=>$item)
         
          <li data-target="#myCarousel" data-slide-to="{{$index}}" class="{{$index==0?'active':'' }}"></li>
          
          @endforeach
          
          
          
          
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
           
          @foreach ($Prodect as $index => $item)
          <div class="item {{$index==0?'active':''}}">
            <img src="{{$item->gallery }}" alt="Chania">
            <div class="carousel-caption slider-text">
              <h3>{{$item->name}}</h3>
              
            </div>
          </div>
              
          @endforeach
      
          
        </div>
      
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="trending-wrapper">
          <h3>Trening</h3>
          @foreach ($Prodect as $item)
          <div class="trending-item">
              <a href="detail/{{$item['id']}}">
            <img class="trending-image"src="{{$item['gallery'] }}" >
            <div class="text"> 
              <h3>{{$item['name']}}</h3>
            </a>
            
            </div>
          </div>
              
          @endforeach
   



@endsection
