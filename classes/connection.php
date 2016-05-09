<?php
$servername = "sql1.njit.edu";
$username = "bms29";
$password = "sqkGCASC";
$dbname = "final";

try {
    $dbh = new PDO('mysql:host='.$servername.';dbname=final', $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
$chk = 'SELECT *FROM users';
$result->exect($chk)
/*$sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP
	)";
*/
try {
  
$dbh->exec($sql);
} catch (PDOException $e) {
echo $sql . "<br>" . $e->getMessage();

}
echo 'done';
?>