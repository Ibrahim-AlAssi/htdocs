<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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

.trending-image{
        height: 100px;
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
<form class="form-horizontal" action="/editprodected" method="POST" enctype="multipart/form-data">
    @csrf
<div class=" container">
    
        
    <div class="row">
        <div class="col-sm-6">
            	<img class="trending-image" src="{{$data['gallery']}}">
                <br><br>
                <label class="col-md-4 control-label" for="filebutton">main_image</label>
  <div class="col-md-4">
    <input id="filebutton" name="image" class="input-file" type="file">
  </div>
                
        </div>
        <div class="col-sm-6">
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
        </div>
        <div class="col-sm-6">
                 <div class="card">
            <h2><a href="#" >back</a></h2>
            <h2> name:{{$data['name']}}</h2>
            <h2 >price:${{$data['price']}}</h2>
            <h2>details:{{$data['description']}}</h2>
            <h2>category:{{$data['category']}}</h2>
            <br><br>
                 
                  <input type='hidden' name="id" value="{{$data['id']}}" >
                        
                        <div class="form-group">
                           
                            <div class="col-md-4">
                              <button type="submit" name="singlebutton" class="btn btn-primary">Edit</button>
                            </div>
                            </div>
                      </div>  
        </div>
        
    </div>

    

    </form>
    

</div>

