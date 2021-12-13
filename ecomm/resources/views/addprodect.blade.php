<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>

</style>
<!------ Include the above in your HEAD tag ---------->
<h1>{{ Auth::user()->roles->first()->display_name }}</h1>
<form class="form-horizontal" action="/addprodect" method="POST" enctype="multipart/form-data">
    @csrf
<fieldset>

<!-- Form Name -->
<legend>PRODUCTS</legend>

<!-- Text input-->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name_fr">Category</label>  
  <div class="col-md-4">
  <input id="product_name_fr" name="Category" placeholder="PRODUCT DESCRIPTION FR" class="form-control input-md" required="" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="available_quantity">Price</label>  
  <div class="col-md-4">
  <input id="available_quantity" name="Price" placeholder="AVAILABLE QUANTITY" class="form-control input-md" required="" type="text">
    
  </div>
</div>



<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="product_description" name="DESCRIPTION"></textarea>
  </div>
</div>

    
 <!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">main_image</label>
  <div class="col-md-4">
    <input id="filebutton" name="image" class="input-file" type="file">
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">ADD Prodect</label>
  <div class="col-md-4">
    <button type="submit" name="singlebutton" class="btn btn-primary">Submit</button>
  </div>
  </div>