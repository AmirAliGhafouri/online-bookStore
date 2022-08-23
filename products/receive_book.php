<?php
    session_start();
    if(!isset($_GET['book_id']))
        header("location:../index.php");

        include "../class.php";
        include "../connect.php";
        $book_id=$_GET['book_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styl.css">
    <script src="https://kit.fontawesome.com/f2f0c7f07a.js" crossorigin="anonymous"></script>

    <title>online Book-Store</title>
</head>
<body>
    <?php
        include "header.php";
        $myDB=new produts();
        $myDB->connect_db($host , $username , $password , $database);
        $myDB->show_book_info("$book_id");
        if($myDB->book_not_exist===false){
    ?>
    <div class="book-info-container">
        <div class="show_book_info">
            <div class="show-book-pic">
                <?php
                    echo "<img src='../image/books/$myDB->book_category/$myDB->book_picture'>";
                ?>
            </div>
            <div class="book-info">
                <?php
                    echo "
                    <h2>Book Information :</h2>
                    <div>
                        <p><strong>book name:</strong></p>
                        <p>$myDB->book_name</p>
                    </div>
                    <div>
                        <p><strong>author:</strong></p>
                        <p>$myDB->book_author</p>
                    </div>
                    <div>
                        <p><strong>category:</strong></p>
                        <p>$myDB->book_category</p>
                    </div>
                    <div>
                        <p><strong>page count:</strong></p>
                        <p>$myDB->book_page</p>
                    </div>
                    <div class='download_btn-container'>
                    
                    <a href='download.php?book_id=$myDB->book_id' class='download-btn'><i class='fa-solid fa-file-arrow-down'></i> Download</a>
                      
                    </div>
                    ";
                ?>
            </div>
        </div>

        <div class="show-book-disc">
            <?php
                echo "<p>$myDB->book_description</p>";
            ?>
        </div>

       
    </div>
    <?php } ?>
</body>
</html>