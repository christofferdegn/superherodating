<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=superherodating", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

<form action=“like.php” method=“post”>
<input type=“hidden” name=“like_count” value=“<?php echo $profile[‘kryptonite’]?>“/>
<input type=“hidden” name=“email” value=“<?php echo $currentEmail?>“/>
<input type=“submit” value=“Like”>
<?php echo $profile[kryptonite]?> likes
</form>