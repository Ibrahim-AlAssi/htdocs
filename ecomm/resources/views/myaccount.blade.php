@extends('masters2')
@section('content')
<div class="row">
<div style="margin-left: 170px" class="span9">
    
	<h3 style="text-align: center" > Accountdetails</h3>	
	<hr class="soft"/>
	<div style="text-align: center"  class="well">
	
           

		
		
		<div class="control-group">
			<label class="control-label" for="inputFname">Name: {{ Auth::user()->name }} </label> 
			

		<div class="control-group">
		<label class="control-label" for="inputEmail">Email :{{ Auth::user()->email }} <sup>:</sup></label>
		
	  </div>	

		

      <div class="control-group">
		<a style="color: rgb(66, 233, 155)" href="/myorder"><p  style="font-weight: bold;">MY orders</p></a>
		
	  </div>

    </div>
     

		
	
	

</div>
</div>
</div>




     
@endsection