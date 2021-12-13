@extends('master')
@section('content')
<style>
.card button {
  margin-top: 0px;
  margin-bottom: 0px;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: left;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.0);
  max-width: 300px;
  margin: auto;
  text-align: left;
  font-family: arial;
 
}
.card button:hover {
  opacity: 0.7;
}
.price {
  color: grey;
  font-size: 22px;
}



</style>

<div class=" container">
    <div class="row">
        <div class="col-sm-6">
            	<img src="{{$data['gallery']}}">
        </div>
        <div class="col-sm-6">
                 <div class="card">
            <h2><a href="/" >back</a></h2>
            <h2> name:{{$data['name']}}</h2>
            <h2 >price:${{$data['price']}}</h2>
            <h2>details:{{$data['description']}}</h2>
            <h2>category:{{$data['category']}}</h2>
            <br><br>
                 <form action="/addtocart" method="POST">
                  @csrf
                  <input type='hidden' name="prodect_id" value="{{$data['id']}}" >
                        <p><button>Add to Cart</button></p>
                        <p><button style=" background-color:rgb(115, 192, 115);" type="submit">Buynow</button></p>
                 </form>
                      </div>  
        </div>
    </div>

    

        
    

</div>

@endsection