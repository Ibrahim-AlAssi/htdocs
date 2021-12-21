<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Responsive Bootstrap Advance Admin Template</title>
    
        <!-- BOOTSTRAP STYLES-->
        <link href="assets2/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets2/css/font-awesome.css" rel="stylesheet" />
           <!--CUSTOM BASIC STYLES-->
        <link href="assets2/css/basic.css" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="assets2/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
<body>
    {{View::make('headeradmin')}}
    {{View::make('adminslider')}}
    @yield('content')
    
    {{View::make('footeradmin')}}
    
</body>

</html>