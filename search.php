<?php
    session_start();
    if(!isset($_POST['srch_sub']))
        header("location:index.php");

    include "class.php";
    include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styl.css">
    <title>online Book-Store</title>
</head>
<body>
    <?php
        include "header.php";
        $search=$_POST['search'];
        $mysql= new mysqli($host , $username , $password , $database);
        if($mysql->connect_error)
            die('connection error');

        $sql="SELECT * FROM books WHERE bookName LIKE '%$search%'";
        $resault=$mysql->query($sql);
        $mysql->close();
        if($resault->num_rows>0){  
            echo "<p style='text-align:center; font-size:30px;'>Search for : $search</p>";         
            echo "<div class='categories'>";
                for($i=0 ; $i<$resault->num_rows ; $i++){
                    $row=$resault->fetch_assoc();
                    $bname=$row['bookName'];
                    $book_pic=$row['book_picture'];
                    $book_id=$row['book_ID'];
                    $category=$row['category'];
                    echo "<a href='products/receive_book.php?book_id=$book_id'>
                            <div class='product_container'>
                                <div class='product-pic'>
                                    <img src='image/books/$category/$book_pic' style='width:100%; height:300px;'>
                                </div>
                                <div class='product-name'>
                                    <p>$bname</p>
                                </div>
                            </div>
                        </a>";
                }
            echo "</div>";
        }

        else{
            echo "<p style='text-align:center; font-size:30px;'>Not found ' $search '</p>"; ;
        }
    ?>
</body>
</html>