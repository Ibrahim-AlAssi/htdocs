@extends('masters')
@section('content')
<div class="row">

        <div class="span9">
        <div class="well np">
            <div id="myCarousel" class="carousel slide homCar">
                <div class="carousel-inner">

                  @foreach ($slider as $index => $item)
                  <div class="item {{$index==0?'active':''}}">
                    <img style="width:100%" src="{{$item->slider}}">
                    
                    <div class="carousel-caption">
                          <h4>{{$item->line1}}</h4>
                          <p><span>{{$item->line2}}</span></p>
                    </div>
                  </div>
                  @endforeach
                </div>


                <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
              </div>
            </div>
          
<!--
New Products
-->
<div class="well well-small">
	<h3>New Products </h3>
	<hr class="soften"/>
		<div class="row-fluid">
      
		<div id="newProductCar" class="carousel slide">
            <div class="carousel-inner">
             
	      <div class="item active">

			  
          @foreach ($newprodect3 as $index => $item)
              
          
              
         
          <ul class="thumbnails">
          <li style="margin: 5px" class="span3">
            <div class="thumbnail">
            <a class="zoomTool" href="prodectdetails-{{$item->id}}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
            <a href="#" class="tag"></a>
            <a  href="product_details.html"><img src="{{$item->gallery}}" alt=""></a>
            </div>
          </li>
          
          
          @endforeach
			  </ul>
        
        
	</div>
  <div class="item">
    @foreach ($newprodect2 as $index => $item)
    <ul class="thumbnails">
      <li style="margin: 5px" class="span3">
      <div class="thumbnail">
      <a class="zoomTool" href="prodectdetails-{{$item->id}}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
      <a href="#" class="tag"></a>
      
      <a  href="product_details.html"><img src="{{$item->gallery}}" alt=""></a>
      </div>
    </li>
    
    
    @endforeach
   
    </ul>
    </div>

		</div>

       

		  <a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
		  </div>
		  </div>
     

		<div class="row-fluid">
      @foreach ($random as $index => $item)
		  <ul class="thumbnails">
			<li  style="margin: 4px" class="span4">
			  <div class="thumbnail">
				 
				<a class="zoomTool" href="prodectdetails-{{$item->id}}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a href="prodectdetails-{{$item->id}}"><img src="{{$item->gallery}}" alt=""></a>
				<div class="caption cntr">
					<p>{{$item->name}}</p>
					<p><strong> ${{$item->price}}</strong></p>
					<h4><a class="shopBtn" href="prodectdetails-{{$item->id}}" title="add to cart"> Add to cart </a></h4>
					<div class="actionList">
					
					</div> 
					<br class="clr">
				</div>
			  </div>
			</li>
		
      @endforeach
		  </ul>
		</div>
	</div>


<!--
	Featured Products
	-->
    <div class="well well-small">
        <h3><a class="btn btn-mini pull-right" href="gridview" title="View more">VIew More<span class="icon-plus"></span></a> Featured Products  </h3>
        <hr class="soften"/>
        <div class="row-fluid">
          @foreach ($random1 as $index => $item)  
        <ul class="thumbnails">
          <li style="margin: 4px" class="span4">
            <div class="thumbnail">
              <a class="zoomTool" href="prodectdetails-{{$item->id}}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
              <a  href="prodectdetails-{{$item->id}}"><img src="{{$item->gallery}}" alt=""></a>
              <div class="caption">
                <h5>{{$item->name}}</h5>
                
                <h4>
                    <a class="defaultBtn" href="prodectdetails-{{$item->id}}" title="Click to view"><span class="icon-zoom-in"></span></a>
                    <a class="shopBtn" href="prodectdetails-{{$item->id}}" title="add to cart"><span class="icon-plus"></span></a>
                    <span class="pull-right">${{$item->price}}</span>
                </h4>
              </div>
            </div>
          </li>
          
          @endforeach
        </ul>	
  </div>
  </div>
  
  <div class="well well-small">
  <a class="btn btn-mini pull-right" href="#">View more <span class="icon-plus"></span></a>
  Popular Products 
  </div>
  <hr>
 
  </div>
  </div>


@endsection