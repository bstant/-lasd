
	<?php
	  class loginView {
	    
	    public function getLoginPage() {
	    
	      if($_GET['form']) {
	        $page = '<!DOCTYPE html>
	        <html lang="en">
	        <head>
		  <meta charset="utf-8">
		  <title>IS 218 Login</title>
		  <meta http-equiv="x-ua-compatible" content="ie=edge">
		  <meta name="viewport" content="width=device-width,
		  initial-scale=1">
		  <link rel="stylesheet" href="css/main.css">
		  <link rel="stylesheet" href="css/login.css">
		</head>
		
		<body>
		  <div class="container" style="margin-top:50px">
		    <section id="content">
		      <form id="login" action="index.php?controller=loginCtrl"
		      method="post">
		        <h1>Register Form</h1>
		    <div>
		      <input type="text" placeholder="Name" id="username" name="name" required />
		    </div>
		    <div>
		      <input type="text" placeholder="Last Name" id="username" name="lastName" required />
		    </div>
			<div>
			  <input type="text" placeholder="Username" required=""
			  id="username" name="username" />
			</div>
			<div>
			  <input type="text" placeholder="email" id="username" name="email" required />
			</div>
			<div>
			  <input type="password" placeholder="Password" required=""
			  id="password" name="password"/>
			</div>
			<div>
			  <input type="password" placeholder="Confirm Password"
			  required="" id="password" name="password2"/>
			</div>
			<input type="hidden" name="form" value="register">
			<div>
			  <input type="submit" value="Register" />
			  <a href="index.php">Log in</a>
			</div>
		      </form>
		    </section>
		    <div style="margin-top:100px">
		      <img src="img/cars.png" alt="cars" width="100%">
		    </div>
		  </div>
		</body>
	      </html>';

	      return $page;


	      }
	      else {
	      
	      $page = '<!DOCTYPE html>
	        <html lang="en">
	        <head>
		  <meta charset="utf-8">
		  <title>IS 218 Login</title>
		  <meta http-equiv="x-ua-compatible" content="ie=edge">
		  <meta name="viewport" content="width=device-width,
		  initial-scale=1">
		  <link rel="stylesheet" href="css/main.css">
		  <link rel="stylesheet" href="css/login.css">
		</head>
		<body>
		  <div class="container" style="margin-top:50px">
		    <section id="content">
		      <form id="login" action="index.php?controller=loginCtrl"
		      method="post">
		        <h1>Login Form</h1>
			<div>
			  <input type="text" placeholder="Username" id="username"
			  name="username" required />
			</div>
			<div>
			  <input type="password" placeholder="Password" required=""
			  id="password" name="password"/>
			</div>
			<input type="hidden" name="form" value="login">
			<div>
			  <input type="submit" value="Log in" />
			  <a href="index.php?form=register">Register</a>
			</div>
		      </form>
		    </section>
		    <div style="margin-top:100px">
		      <img src="img/cars.png" alt="cars" width="100%">
		    </div>
		  </div>
		</body>
	      </html>';

	      return $page;
	      }
	    }
	  }
