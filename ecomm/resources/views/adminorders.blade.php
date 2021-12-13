<?php

use App\Http\Controllers\prodectcontroller;
use App\Models\User;
use App\Models\prodect;


  
?>
@extends('master')
@section("content")

<div class="custom-product">
 
    <div class="col-sm-10">
       <div class="trending-wrapper">
           <h4>Orders</h4><br><br><br><br>
          
           
           @foreach($orders as $item)
           <form action="/adminconfrim/{{$item->id}}" method="POST">
           <div class=" row searched-item cart-list-devider">
           
            <div class="col-sm-3">
              <?php
              $iP=$item->product_id;
              $image = prodect::find($iP);
              
              

    ?>
              <a href="detail/{{$item->product_id}}">
                  <img class="trending-image" src="{{$image->gallery}}">
                </a>
           </div>
           
            <div class="col-sm-4">
  <?php
              $id=$item->user_id;
              $data = User::find($id);
              
              

    ?>
                   <div class="">
                    <h2>{{$item->id}}</h2>
                    <h2>Name :{{$data->name}}</h2>
                    <h2>Delivery Status :{{$item->status}}</h2>
                     <h5>Payment Method :{{$item->payment_method}}</h5>
                     <h5>Payment Status :{{$item->payment_status}}</h5>
                     <h5>Address :{{$item->address}}</h5>
                     <br>
                   </div>
            </div>
            <div class="col-sm-3">
              
                @csrf
               <button type="submit" class="btn btn-warning">confrim</button>
              </form>
            </div>
           </div>
           @endforeach
         </div>
         

    </div>
</div>






@endsection