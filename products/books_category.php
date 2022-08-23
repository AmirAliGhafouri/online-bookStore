<?php
    session_start();
    include "../class.php";
    include "../connect.php";
    $category=$_GET['category'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styl.css">
    <title>online Book-Store</title>
</head>
<body>
    <?php 
        include "header.php";

        $myDB=new produts();
        $myDB->connect_db($host , $username , $password , $database);
        $myDB->products("$category");
    ?>
    
    
</body>
</html>