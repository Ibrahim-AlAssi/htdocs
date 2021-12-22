@extends('masters')
@section('content')


<div class="row">
	
	
		<div class="span9">
	<!--
	New Products
	-->
		<div class="well well-small">
		<h3 style="margin-bottom: 0px" >Our Products </h3>
			<div class="row-fluid">
				@foreach ($Prodect as $item)  
			  <ul class="thumbnails">
				
				<li style="margin: 4px" class="span4">
					
				  <div  class="thumbnail">
					<a href="product_details.html" class="overlay"></a>
					<a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					<a href="product_details.html"><img src="{{$item->gallery}}" alt=""></a>
					<div class="caption cntr">
						<p>{{$item->name}}</p>
						<p><strong> ${{$item->price}}</strong></p>
						<h4><a class="shopBtn" href="/prodectdetails-{{$item->id}}" title="add to cart"> Add to cart </a></h4>
						<div class="actionList">
							
						</div> 
						<br class="clr">
					</div>
				  </div>
				</li>
				@endforeach
			  </ul>
			  
			</div>
			<span>
				{{$Prodect->links()}}
			</span>  
		
		
		</div>
		</div>
		</div>





@endsection