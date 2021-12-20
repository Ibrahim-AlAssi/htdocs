@extends('masters2')
@section('content')

<div class="row">
	<div class="span12">
   
	<div class="well well-small">
		<h1>Check Out <small class="pull-right"> </small></h1>
	<hr class="soften"/>	

	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
				  <th>	Ref. </th>
                  <th>Avail.</th>
                  <th>Unit price</th>
                  <th>Qty </th>
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
				@foreach ($prodect as $index => $item) 
                <tr>
                  <td><img width="100" src="{{$item->gallery}}" alt=""></td>
                  <td>{{$item->name}}<br>category:{{$item->category}} 
                  <td> - </td>
                  <td><div class="btn-group">
					
					<a href="/removecart-{{$item->cart_id}}" class="shopBtn">Delete</a>
				   </div>
				</td>
                  <td>${{$item->price}}</td>
                  <td>
					<input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text" value="1">
				  
				</td>
                  <td>${{$item->price}}</td>
                </tr>
				@endforeach
				
                <tr>
                  <td colspan="6" class="alignR">Total products:	</td>
                  <td style="font-weight: bold;" >${{$prodects}}</td>
                </tr>
                 
				 
				 
				</tbody>
            </table><br/>
		
		
           
			<table class="table table-bordered">
			<tbody>
                <tr><td>ESTIMATE YOUR SHIPPING & TAXES</td></tr>
                 <tr> 
				 <td>
					<form action="/orderPlace" method="POST" >
						@csrf
					  <div class="control-group">
						<label class="span2 control-label" for="inputEmail">Address</Address></label>
						<div class="controls">
						  <input type="text" name="address" placeholder="Address">
						</div>
					  </div>
					  <div class="control-group">
						<label class="span2 control-label" for="pwd">Payment method</label>
						
                  		<input type="radio" name="payment" id="pwd" value="paypale"><img src="assets/img/pp.png" alt="payment">
                  		<input type="radio" name="payment" id="pwd" value="Emi"><img src="assets/img/visa.png" alt="payment">
                  		<input type="radio" name="payment" id="pwd" value="Payment on delirvery"><img src="assets/img/maestro.png" alt="payment">
					  </div>
					  <div class="control-group">
						<div class="controls">
						  <button type="submit" class="shopBtn">Click to check the price</button>
						</div>
					  </div>
					</form> 
				  </td>
				  </tr>
              </tbody>
            </table>		
	<a href="/" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
	

</div>
</div>
</div>

@endsection