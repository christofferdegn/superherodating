<!DOCTYPE html>
<head>
</head>
<body>

<?php include('connect.php')
?>
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //var_dump($_GET);
    var_dump($_POST);
?>
<?php
    if(isset($_POST['comments']))
    {
      echo "jeps, comment var der";
      $sql4 = ("UPDATE profiles SET comment = ?  WHERE id = ?");
      try {
        $stmt5 = $conn->prepare($sql4)->execute([$_POST["comments"],$_POST["profile_id"]]);
      }
  
     catch(PDOException $e)
      {
        echo "Error: " . $e->getMessage();
      }
      var_dump($stmt5);
    }

    if(isset($_POST['superpowers']))
    {
      echo "jeps, comment var der";
      $sql5 = ("UPDATE profiles SET superpower = ?  WHERE id = 1");
      try {
        $stmt6 = $conn->prepare($sql5)->execute([$_POST["superpowers"],$_POST["profile_id"]]);
      }
  
     catch(PDOException $e)
      {
        echo "Error: " . $e->getMessage();
      }
      var_dump($stmt6);
    }

    ?>
    <?php

$sql = "SELECT * FROM profiles WHERE id =1";
    $query = $conn->prepare( $sql );
    $query->execute();
    $results = $query->fetchAll();
?>
<table style="border:1px solid black;">
    <?php
    foreach( $results as $row ){
    
    ?>
        <h1>Your Profile<h1>
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
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row["like_"];?><td>
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row["flower"];?><td>
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row["chocolate"];?><td>
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row["ring"];?><td>
            <td style="border:1px solid black   ; width: 100px; height: 100px;"><img style="width:100px;" src="<?php echo $row["picture"];?>"><td>
        </tr>
        <tr>
        <form method="POST">
                <input type="text" name="superpowers" placeholder="Type in superpower">
                <input type="hidden" name="profile_id" value="<?php echo $super?>">
                <input type="submit" name="Submit" value="Update superpower">
            </form>
        </tr>
   <?php }?>

<?php
   $sql1 = "SELECT * FROM profiles WHERE id!=1";
    $query = $conn->prepare( $sql1 );
    $query->execute();
    $results1 = $query->fetchAll();
?>
 <table style="border:1px solid black;">
    <h2>Other Profiles</h2>
    <?php

    foreach( $results1 as $row1 ){
        $super= $row1["id"];
        $likecount = $row1["like_"];
        $comment = $row1["comment"];
        $race = $row1["superpower"];
    
       //UPDATE LIKES
    
       if(isset($_GET["$super"]))
        {
          //echo "jeps, comment var der";
          $sql4 = ("UPDATE profiles SET like_ = '$likecount' + 1 WHERE id = '$super'");
          try {
            $stmt5 = $conn->prepare($sql4)->execute([$likecount]);
          }
    
         catch(PDOException $e)
          {
            echo "Error: " . $e->getMessage();
          }
        //  var_dump($stmt4);
        }
      //  foreach( $results2 as $id ){
       //
      
        
    ?>
    
        <tr>
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row1["name"];?><td>
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row1["age"];?><td>
            <td style="border:1px solid black; width: 100px; height: 100px;"><img style="width:100px;" src="<?php echo $row1["picture"];?>"><td>
            <td style="border:1px solid black; width: 100px; text-align: center;"><a href="profile<?php echo $row1["id"];?>.php">Visit profile</a><td>
            <td style="border:1px solid black; width: 100px; text-align: center;"><?php echo $row1["like_"];?>
            <form method="GET">
            <input placeholder="Like" type="submit" name="<?php echo $super ?>" value="LIKE">
            </form>
            </td>
            
            
            <td style="border:1px solid black; max-width: 500px; padding: 10px; text-align: center;">
                <h4>Last comment</h4>
                    <p style="padding: 5px;"><?php echo $row1["comment"];?></p>
            <form method="POST">
                <input type="text" name="comments" placeholder="Type comment">
                <input type="hidden" name="profile_id" value="<?php echo $super?>">
                <input type="submit" name="Submit" value="Submit comment">
            </form>
        </tr>
   <?php }?>

   

</body>