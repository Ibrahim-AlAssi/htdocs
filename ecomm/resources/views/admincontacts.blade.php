@extends('masteradmin')
@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">

    <h1 class="page-head-line">INVOICE </h1>

</div>
</div>
<!-- /. ROW  -->
<div class="row">
<div class="col-md-12">
   <div >


<div  class="row text-center contact-info">

</div>
@foreach ($contacts as $item)
<div  class="row pad-top-botm client-info">
    
<div class="col-lg-6 col-md-6 col-sm-6">
    
        
   
<h4>  <strong>Client Information</strong></h4>
name:<strong> {{$item->user->name}}</strong>
<br />
email:<b>{{$item->user->email}}</b>
<br />
Title:{{$item->title}}
<br />
Subject:<b>{{$item->subject}}
<br />

</div>
<hr> 


</div>
<hr style="border: 1px solid red;">
@endforeach

</div>
</div>
</div>

</div>
<!-- /. PAGE INNER  -->
</div>


@endsection