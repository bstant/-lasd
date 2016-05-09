
	<?php

	  class loginController extends controller {
	    
	    public function get() {
	      
	      $login = new loginView;

	      $loginPage = $login->getLoginPage();
	      $this->html .= $loginPage;
	    }

	    public function post() {
	      
	      define('DB_SERVER', 'sql1.njit.edu');
	      define('DB_USERNAME', 'bms29');
	      define('DB_PASSWORD', 'sqkGCASC');
	      define('DB_DATABASE', 'bms29');
	      $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

	      if($_POST['form'] == login) {
	      
	        $myusername = mysqli_real_escape_string($db,$_POST['username']);
	        $mypassword = mysqli_real_escape_string($db,$_POST['password']);
		
	        $sql = "SELECT userName, userId FROM carUser WHERE userName = '$myusername' and password = '$mypassword'";
	        $result = mysqli_query($db, $sql);
	        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	      
	        $count = mysqli_num_rows($result);
	      
	        if($count == 1) {
	          session_start();
		
		  $_SESSION['login_user'] = $myusername;
		  $_SESSION['user_id'] = $row['userId'];
		  
		  header("location: index.php?controller=homeController");
	        }
	        else {
		  $error = "user name or password incorrect";
	          echo $error;
	        }
	      }
	      else {
		    $name = mysqli_real_escape_string($db,$_POST['name']);
		    $lastName = mysqli_real_escape_string($db,$_POST['lastName']); 
		    $myusername = mysqli_real_escape_string($db,$_POST['username']);
		    $email = mysqli_real_escape_string($db,$_POST['email']);
		    $mypassword = mysqli_real_escape_string($db,$_POST['password']);
		    $mypassword2 = mysqli_real_escape_string($db,$_POST['password2']);

		if($mypassword == $mypassword2) {
		  $id = uniqid();
		  $sql = "INSERT INTO carUser (userId, name, lastName, userName, email, password) VALUES('$id', '$name', '$lastName', '$myusername', '$email', '$mypassword')";
		  if($db->query($sql) === TRUE) {
		    session_start();
		    $_SESSION['login_user'] = $myusername;
		    $_SESSION['user_id'] = $id;
		    header("location: index.php?controller=homeController");
		  }
		  else {
		    echo "Error: " . $sql . "<br>" . $db->error;
		  }
		}
		else {
		  $error = "Passwords don't match";
		  echo $error;
		}
      }
    }

	    public function put() {}
	    public function delete() {}
	  }
