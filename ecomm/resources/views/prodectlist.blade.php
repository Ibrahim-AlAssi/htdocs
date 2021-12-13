<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    .trending-image{
        height: 100px;
    }
    </style>
<div class="custom-product">
    <div class="col-sm-10">
       <div class="trending-wrapper">
           <h4>Result for Products</h4>
           
           @foreach($prodect as $item)
           <div class=" row searched-item cart-list-devider">
            <div class="col-sm-3">
               <a href="detail/{{$item->id}}">
                   <img class="trending-image" src="{{$item->gallery}}">
                 </a>
            </div>
            <div class="col-sm-4">
                   <div class="">
                     <h2>{{$item->name}}</h2>
                     <h5>{{$item->description}}</h5>
                   </div>
            </div>
            <div class="col-sm-3">
               <a href="/removeprodect/{{$item->id}}" class="btn btn-warning" >Remove product</a>
               <a href="/editprodect/{{$item->id}}" class="btn btn-warning" >edit product</a>
            </div>
           </div>
           @endforeach
         </div>
         

    </div>
</div>