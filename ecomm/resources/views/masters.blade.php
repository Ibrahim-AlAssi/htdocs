
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <style>
        .w-5{
         display: inline-block;
            height: 32px;
     line-height: 32px;
     padding: 0 10px;
     font-size: 14px;
     border: 1px solid #ccc!important;
     
     position: relative;
     
     box-shadow: none;
     text-decoration: none;
     text-align: center;
     text-transform: none;
     white-space: nowrap;
     vertical-align: middle;
     user-select: none;
     transition: all .3s ease-out;
     cursor: pointer;
     overflow: visible;
        }
    </style>

</head>
<body>
    {{View::make('headers')}}
    {{View::make('slider')}}
    @yield('content')
    
    {{View::make('footers')}}
    
</body>

</html>