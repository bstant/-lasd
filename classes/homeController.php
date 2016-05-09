
	<?php
	  class homeController extends controller {
	    
	    public function get() {
	      
	      session_start();
	      define('DB_SERVER', 'sql1.njit.edu');
	      define('DB_USERNAME', 'bms29');
	      define('DB_PASSWORD', 'sqkGCASC');
	      define('DB_DATABASE', 'bms29');
	      $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	      
	      $sql = "SELECT * FROM cInventory WHERE userId='".$_SESSION['user_id']."'";
	      $result = mysqli_query($db, $sql);
	      $row = $result->fetch_assoc();
	      $keys = (array_keys($row));
	      
	      $homepage = new homepageView;
	      
	      $pageHeader = $homepage->getHeader();
	      $this->html .= $pageHeader;
	      
	      $navBar = $homepage->getNavBar();
	      $this->html .= $navBar;
	      
	      if($row != 0) {
	        $userInventory = $homepage->getUserInventory($keys, $result);
	        $this->html .= $userInventory;
	      }
	      
	      $sql = "SELECT * FROM Inventory";
	      $result = mysqli_query($db, $sql);
	      $row = $result->fetch_assoc();
	      $keys = (array_keys($row));
	      	     	      
	      $inventoryTable = $homepage->getInventory($keys, $result);
	      $this->html .= $inventoryTable;
	      
	      $buttons = $homepage->getButtons();
	      $this->html .= $buttons;
	      
	    }

	    public function post() {}
	    public function put() {}
	    public function delete() {}
	  }
