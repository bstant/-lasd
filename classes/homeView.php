
	<?php
	  class homepageView {
	    
	    public function getHeader() {

	      session_start();

	      $pageHeader = '<!DOCTYPE html>
	        <html lang="en">
	          <head>
	            <meta charset="utf-8">
	            <title>Home</title>
	            <meta http-equiv="x-ua-compatible" content="ie=edge">
	            <meta name="viewport" content="width=device-width, initial-scale=1">
	            
	            <link rel="stylesheet" href="css/main.css">
	            <link rel="stylesheet" href="css/login.css">
	            
	            <style>
	              table {
		 	 		width: 100%;
		 	 		background-color: #003366;
		 	 		border-collapse: collapse;
		 	 	}
		 	 	table tr:nth-child(even) {
		 	 	  background-color: #e6e6e6;
		 	 	}
		 	 	table tr:nth-child(odd) {
		 	 	  background-color:#cccccc;
		 	 	}
		 	 	table th {
		 	 	  background-color: #003366;
		 	 	  color: white;
		 	 	  padding: 10px;
		 	 	  border: 1px solid black;
		 	 	}
		 	 	table td  {
		 	 	  padding: 10px;
		 	 	  text-align: center;
		 	 	}
		 	  </style>
		 	</head>
		 	<body>';
		 		            
	      return $pageHeader;
	    }
	    
	    
	    public function getNavBar() {
	      
	      $navBar = '
	        <div style="background-image: url(img/navy-background.png); width:85%; margin:auto; border:2px solid; border-radius:5px">
	           <div class="container">
	             <h1 style="color:white">WELCOME</h1>
	             <h3 style="color:white">'.$_SESSION['login_user'].'</h3>
	           </div>
	        </div>
	      ';
	      
	      return $navBar;
	    }
	    
	    
	    public function getUserInventory($keys, $result) {
	    
	      $userInventory = '
	        <br>
	      <div class="container">
		 	    <h1>MY CARS</h1>
		 	    <table>
		 	      <thead>
		 	        <tr>';
		 	          for($i=0; $i<count($keys); $i++){
		 	            if($keys[$i] != 'UserId') {
		 	              $userInventory .= '<th>'.$keys[$i].'</th>';
		 	            }
		 	          }
		 	          $userInventory .= '<th>Details</th></tr>
		 	      </thead>
		 	      <tbody>';
		 	        foreach($result as $record) {
		 	          $userInventory .= '<tr>';
		 	          for($i=0; $i<count($record); $i++) {
		 	            if($keys[$i] != 'UserId') {
		 	             if($keys[$i] == 'Price'){
		 	              $userInventory .= '<td>$ '.$record[$keys[$i]].'</td>';
		 	             }
		 	             else {
		 	              $userInventory .= '<td>'.$record[$keys[$i]].'</td>';
		 	             }
		 	            }
		 	          }
		 	          $userInventory .= '<td><a href="index.php?controller=detailCtrl&vin='.$record['VIN'].'">
		 	           <img src="img/info.png" alt="details" height="25" width="25">
		 	          </a></td></tr>';
		 	        }
		 	      $userInventory .= '</tbody>
		 	    </table>
		 	  </div>';
		 	  
		 	  return $userInventory;
	    }
	    
	    
	    public function getCarInventory($keys, $result) {
			
		  session_start();
		  
	      $carInventory = '<br>
		   			<div class="container">
		   			  <h1>CAR INVENTORY</h1>
		   				<table>
		   					<thead>
		   						<tr>';
		   							for($i=0; $i<count($keys); $i++){
		   								if($keys[$i] != 'UserId') {
		   									$carInventory .= '<th>'.$keys[$i].'</th>';
		   								}
		   							}
		   	   $carInventory .='<th>Details</th></tr>
		   					</thead>
		   					<tbody>';
		   							foreach($result as $record) {
		   								$carInventory .= '<tr>';
		   								for($i=0; $i<count($record); $i++) {
		   									if($keys[$i] != 'UserId') {
		   									 if($keys[$i] == 'Price'){
		 	              					  $carInventory .= '<td>$ '.$record[$keys[$i]].'</td>';
		 	             					 }
											 else {
		   										$carInventory .= '<td>'.$record[$keys[$i]].'</td>';
		   									 }
		   									}
		   								}
		   								$carInventory .= '<td><a href="index.php?controller=detailCtrl&vin='.$record['VIN'].'">
		   								 <img src="img/info.png" alt="details" height="25" width="25">
		   								</a></td></tr>';
		   							}
		   		   $carInventory .='</tbody>
		   				</table>
		   			</div>';

	      return $carInventory;
	    }
	    
	    
	    public function getButtons() {
	      $buttons = '
	        <br>
	        <div class="container">
	          <div style="width:48%; float:left">
			   <button type="submit" style="background-color:#003366; color:white; font-weight:bold; font-size:19px; width:120px; height:35px; border: 2px solid black; border-radius:5px; margin-left:10px">
			    <a href="index.php?controller=carformCtrl" style="color:white; text-decoration:none">+ Add Car</a>
			   </button>	          
	          </div>
	          <div style="width:48%; float:right">
	            <div style="width:30%; float:right">
	              <form action="classes/logout.php" method="post">
	                <button type="submit" style="background-color:#003366; color:white; font-weight:bold; font-size:19px; width:120px; height:35px; border: 2px solid black; border-radius:5px">Logout</button>
	              </form>
	            </div>
	          </div>
	        </div>';
	        
	        return $buttons;
	    }
	    
	    
	    public function getFooter() {
	      
	      $footer = '</body>
	        </html>';
	      
	      return $footer;
	    }
	 }
