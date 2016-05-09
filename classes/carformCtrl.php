<?php
 
 class carformCtrl extends controller {
  
  public function get() {
   
   session_start();
   
   $carform = new carformView;

   $pageHeader = $carform->getHeader();
   $this->html .= $pageHeader;

   $navBar = $carform->getNavBar();
   $this->html .= $navBar;
   
   $body = $carform->getBody();
   $this->html .= $body;

   $footer = $carform->getFooter();
   $this->html .= $footer;
  }

  public function post() {
   session_start();
   
   $vinNum = $_POST['vin'];
   
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL,
   "https://api.edmunds.com/api/vehicle/v2/vins/$vin?fmt=json&api_key=u48d7aetdk4yz6pwqnzd62ez");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $output = curl_exec($ch);
   curl_close($ch);
   
   $response = json_decode($output);
   
   $userid = $_SESSION['user_id'];
   $make = $response->make->name;
   $model = $response->model->name;
   $year = $response->years[0]->year;
   $condition = $_POST['cond'];
   $price;

   if($condition == 'new'){
    $price = $response->price->baseInvoice;
   }
   else{
    $price = $response->price->usedPrivateParty;
   }
  
   define('DB_SERVER', 'sql1.njit.edu');
   define('DB_USERNAME', 'bms29');
   define('DB_PASSWORD', 'sqkGCASC');
   define('DB_DATABASE', 'bms29');
   $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

   //sql query
   $sql = "INSERT INTO Inventory (VIN, UserId, Make, Model, Year, Condition,
   Price) VALUES('$vinNum', '$userid', '$make', '$model', '$year', '$condition',
   '$price')";

   if($db->query($sql) === TRUE) {
    header("location: index.php?controller=homeController");
   }
   else {
    echo "Error: " . $sql . "<br>" . $db->error;
   }
  }

  public function put() {}
  public function delete() {}

 }
