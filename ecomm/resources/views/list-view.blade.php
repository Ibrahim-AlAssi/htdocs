@extends('masters')
@section('content')


<!-- 
Body Section 
-->
<div class="row">
   
    <div class="span9">
    <div class="well well-small">
        
        
        
        <hr class="soften">
        @foreach ($Prodect as $index => $item)  
        <div style="margin: 5px" class="row-fluid">	 
            
            <div class="span2">
                
                <img src="{{$item->gallery}}" alt="">
            </div>
            <div class="span6">
                <h5>{{$item->name}}</h5>
                <p>
                    {{$item->description}}
                </p>
            </div>
            <div class="span4 alignR">
            <form class="form-horizontal qtyFrm">
            <h3> ${{$item->price}}</h3>
            <br>
            <div class="btn-group">
              <a href="prodectdetails-{{$item->id}}" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
              <a href="prodectdetails-{{$item->id}}" class="shopBtn">VIEW</a>
             </div>
             
                </form>
               
            </div>
            
        </div>
        <hr class="soften">
        @endforeach
        <span>
            {{$Prodect->links()}}
        </span>  
    </div>
    </div>
    </div>
  

@endsection