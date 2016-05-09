<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/main.css">
        <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        

	<?php
	  class app {
	    public function __construct() {
	      $controller = 'loginCtrl';

	      if(isset($_REQUEST['controller'])) {
	        $controller = $_REQUEST['controller'];
	      }

	      $route = new $controller;
	      $request_method = $_SERVER['REQUEST_METHOD'];

	      $route->$request_method();
	      $page_output = $route->getHTML();
	      echo $page_output;
	    }
	  }
	?>
	
        
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
<?php
