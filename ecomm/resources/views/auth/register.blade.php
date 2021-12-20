@extends('masters')
@section('content')
<div class="row">
<div class="span9">
    
	<h3 style="text-align: center" > Registration</h3>	
	<hr class="soft"/>
	<div class="well">
	<form class="form-horizontal" method="POST" action="{{ route('register') }}">
            @csrf

		<h3>Your Personal Details</h3>
		
		<div class="control-group">
			<label class="control-label" for="inputFname">Name <sup>*</sup></label>
			<div class="controls">
			  <input id="name"  type="text" name="name" :value="old('name')" required autofocus />
              
			</div>
		 </div>
		 
         
		<div class="control-group">
		<label class="control-label" for="inputEmail">Email <sup>*</sup></label>
		<div class="controls">
		  <input id="email"  type="email" name="email" :value="old('email')" required />
		</div>
	  </div>	

		<div class="control-group">
		<label class="control-label">Password <sup>*</sup></label>
		<div class="controls">
		  <input id="password" 
          type="password"
          name="password"
          required autocomplete="new-password" />
		</div>
	  </div>

      <div class="control-group">
		<label class="control-label">Confirm Password <sup>*</sup></label>
		<div class="controls">
		  <input id= "password_confirmation" class="block mt-1 w-full"
          type="password"
          name="password_confirmation" required />
		</div>
	  </div>

     

		
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="submitAccount" value="Register" class="exclusive shopBtn">
		</div>
	</div>
	</form>
</div>

</div>
</div>




     
@endsection