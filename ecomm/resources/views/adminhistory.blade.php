@extends('masteradmin')
@section('content')

<div id="wrapper">
    <div id="page-wrapper">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="table-responsive">
                           <table class="table table-striped table-bordered table-hover">
                       <thead>
                           <tr>
                               <th>image</th>
                               <th>Description</th>
                               <th>Status.</th>
                               <th>Payment_method</th>
                                <th>Address</th>
                                <th>Price</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach ($orders as $item)
                           <tr style="padding: 0px">
                            <td><img style="margin-right: 0%" width="20%" src="{{$item->product->gallery}}"></td>
                               <td>name:{{$item->user->name}}<br>category:{{$item->product->category}}<br>email:{{$item->user->name}}</td>
                             
                                
                               <td>{{$item->status}}
                                    
                            </td>
                               <td>{{$item->payment_method}}</td>
                               
                               <td>{{$item->address}}</td>
                               <td>${{$item->product->price}}</td>
                               
                               
                           </tr>
                          
                           @endforeach
                           
                       </tbody>
                   </table>
                </div>
                <hr />
                
                
                 
                 
            </div>
        </div>
        
            </div>
        
        @endsection