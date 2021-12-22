@extends('masteradmin')
@section('content')

<div id="wrapper">
    <div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
    <div class="col-md-12">
        <h1 style="text-align: center" class="page-head-line">Product</h1>
        
        @foreach ($Prodect as  $item)
        <form class="form-horizontal" action="editproduct" method="POST" enctype="multipart/form-data">
            @csrf
        
            <img style="width:10%" src="{{$item->gallery}}">
           price <input type="text" name="price" value="{{$item->price}}" class="input-xlarge"/>
           name <input type="text" name="name" value="{{$item->name}}" class="input-xlarge"/>
           category <input type="text" name="category" value="{{$item->category}}" class="input-xlarge"/><br>
           description <input type="text" name="description" value="{{$item->description}}" class="input-xlarge"/>
            <input  id="filebutton" name="image" class="input-file" type="file" >
            <div style="margin-top: 10px" class="col-sm-3">
                
                
                    <div class="col-md-4">
                        
                        <input type='hidden' name="id" value="{{$item['id']}}" >
                      </div><br>
                      <a href="/removeproduct-{{$item->id}}" class="btn btn-warning" >Remove Product</a>
                      <button type="submit" name="singlebutton" class="btn btn-warning">Submit</button>
                      
                </form>

             </div>
             
            
            
            
         
             <br><br><br><br><hr>
             
        @endforeach
        <hr style="border: 1px solid red;">
             <span>
                {{$Prodect->links()}}
            </span>  
            <hr style="border: 1px solid red;">
        <form class="form-horizontal" action="addproduct" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="control-group">
              price<input type="text" name="price"  class="input-xlarge"/>
           name<input type="text" name="name"  class="input-xlarge"/>
           category<input type="text" name="category"  class="input-xlarge"/><br>
           description<input type="text" name="description"  class="input-xlarge"/>
            <input  id="filebutton" name="image" class="input-file" type="file" >
            </div>
            <button type="submit" name="singlebutton" class="btn btn-warning">Add New Product</button>
        </form>
    </div>
        </div>
    </div>
</div>
</div>





@endsection