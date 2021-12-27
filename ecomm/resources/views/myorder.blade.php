@extends('masters2')
@section('content')

<div class="row">
	<div class="span12">
   
	<div class="well well-small">
		<h1>History orders <small class="pull-right"> </small></h1>
	<hr class="soften"/>	

	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
				  <th>	Status </th>
                  <th>Payment_method.</th>
                  <th>Price</th>
                  <th>Address </th>
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
				@foreach ($orders as $item) 
                <tr>
                  <td><img width="100" src="{{$item->gallery}}" alt=""></td>
                  <td>{{$item->name}}<br>category:{{$item->category}} <br>quantity:{{$item->quantity}} </td>
                  <td> {{$item->status}} </td>
                  <td>
					{{$item->payment_method}}
					
				   
				</td>
                  <td>${{$item->price}}</td>
                  <td>
					{{$item->address}}
				  
				</td>
                  <td>${{$item->totalprice}}</td>
                </tr>
				@endforeach
        <tr>
          <td colspan="6" class="alignR">Total products:	</td>
          <td style="font-weight: bold;" >{{$prodects}}</td>
        </tr>
				
               
                 
				 
				 
				</tbody>
            </table><br/>
		
		
           
					
	<a href="/" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
	

</div>
</div>
</div>

@endsection