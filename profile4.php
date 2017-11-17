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

<?php


$sql = "SELECT * FROM profiles WHERE id=4";
    $query = $conn->prepare( $sql );
    $query->execute();
    $results = $query->fetchAll();
?>
<table style="border:1px solid black;">
    <?php
    foreach( $results as $row ){
    ?>
        <h1>Catwoman<h1>
        <tr>
        <tr>
            <td style="border:1px solid black; width: 100px; text-align: center;">name<td>
            <td style="border:1px solid black; width: 100px; text-align: center;">age<td>
            <td style="border:1px solid black; width: 300px; text-align: center;">superpower<td>
            <td style="border:1px solid black; width: 100px; text-align: center;">likes<td>
            <td style="border:1px solid black; width: 100px; text-align: center;">flowers<td>
            <td style="border:1px solid black; width: 100px; text-align: center;">chocolates<td>
            <td style="border:1px solid black; width: 100px; text-align: center;">rings<td>
            <td style="border:1px solid black; width: 100px; text-align: center;">picture<td>
        </tr>
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row["name"];?><td>
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row["age"];?><td>
            <td style="border:1px solid black; width: 300px; text-align: center;"><?php echo $row["superpower"];?><td>
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row["like"];?><td>
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row["flower"];?><td>
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row["chocolate"];?><td>
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row["ring"];?><td>
            <td style="border:1px solid black; width: 100px; height: 100px;"><img style="width:100px;" src="<?php echo $row["picture"];?>"><td>
        </tr>
   <?php }?>