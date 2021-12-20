
<?php

use App\Http\Controllers\prodectcontroller;
$total= 0;
if(Auth::check()){
  $total= prodectcontroller::cart();
}
  
?>
<html lang="en">
  
    <meta charset="utf-8">
    <title>Twitter Bootstrap shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">


<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
				</div>
				@if(Auth::check())
              
         
				<a href="/logout"><span class="glyphicon glyphicon-user"></span> logout</a>     
				<a style="color: red" href="index.html">  welcome {{ Auth::user()->name }}</a> 
				@endif
				<a href="/"> <span class="icon-home"></span> Home</a> 
				<a href="myaccount"><span class="icon-user"></span> My Account</a> 
				<a href="/register"><span class="icon-edit"></span> Free Register </a> 
				<a href="contact"><span class="icon-envelope"></span> Contact us</a>
				<a href="carts"><span class="icon-shopping-cart"></span> ({{$total}}) Item(s)  <span class="badge badge-warning"></span></a>
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="/"><span>Twitter Bootstrap ecommerce template</span> 
		<img src="assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
	
	<div style="display: hidden" class="span4">
	
	</div>

	<div class="span4 alignR">
	<p><br> <strong> Support (24/7) :  0800 1234 678 </strong><br><br></p>
	
	<span class="btn btn-warning btn-mini">$</span>
	
	</div>
</div>


<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class="active"><a href="/">Home	</a></li>
			  <li class=""><a href="list-view">List View</a></li>
			  <li class=""><a href="gridview">Grid View</a></li>
			  <li class=""><a href="#">Three Column</a></li>
			  <li class=""><a href="#">Four Column</a></li>
			  <li class=""><a href="#">General Content</a></li>
			</ul>
			<form action="/search" method="GET" class="navbar-search pull-left">
			  <input type="text" placeholder="Search" name="query" class="search-query span2">
			</form>
			<ul class="nav pull-right">
			<li class="dropdown">
				<a href="/login"><span class="icon-lock"></span> Login </a>
				
			</li>
			</ul>
		  </div>
		</div>
	  </div>
	</div>