<!DOCTYPE html>
<html>
<body>
    <header><?php include 'header.php'?> </header>
<h1>
<?php 
echo "this is a test";
?>
</h1>
<p1>
    <?php include 'database.inc'?>
    <?php  
    // Create connection
    $conn = new mysqli($dbLocation, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";?>

?>
</p1>
</body>
</html>