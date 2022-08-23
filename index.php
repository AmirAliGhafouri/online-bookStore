<?php
    session_start();
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
    <header>
       <?php include "header.php" ?>
        <div class="header-wall">
            <h1>Welcome To Online Book Store</h1>
        </div>
    </header>

    <section>
        <div>
            <h3 class="catrgory-title">Categories of books :</h3>
            <div class="categories">
                <a href="products/books_category.php?category=educational">
                    <div class="product">
                        <div>
                            <img src="image/category/educational.png" alt="educational">
                        </div>
                        <div class="product-type">
                            <p>Educational Books</p>
                        </div>
                    </div>
                </a>

                <a href="products/books_category.php?category=children">
                    <div class="product">
                        <div>
                            <img src="image/category/children.png" alt="children">
                        </div>
                        <div class="product-type">
                            <p>Children Books</p>
                        </div>
                    </div>
                </a>

                <a href="products/books_category.php?category=language">
                    <div class="product">
                        <div>
                            <img src="image/category/language.png" alt="language">
                        </div>
                        <div class="product-type">
                            <p>Language Books</p>
                        </div>
                    </div>
                </a>

                <a href="products/books_category.php?category=religious">
                    <div class="product">
                        <div>
                            <img src="image/category/religious.png" alt="religious">
                        </div>
                        <div class="product-type">
                            <p>Religious Books</p>
                        </div>
                    </div>
                </a>

                <a href="products/books_category.php?category=novel">
                    <div class="product">
                        <div>
                            <img src="image/category/novel.png" alt="novel">
                        </div>
                        <div class="product-type">
                            <p>Novels</p>
                        </div>
                    </div>
                </a>

                <a href="products/books_category.php?category=poem">
                    <div class="product">
                        <div>
                            <img src="image/category/poem.png" alt="poem">
                        </div>
                        <div class="product-type">
                            <p>Poetry Books</p>
                        </div>
                    </div>
                </a>

                <a href="products/books_category.php?category=scientific">
                    <div class="product">
                        <div>
                            <img src="image/category/scientific.png" alt="scientific">
                        </div>
                        <div class="product-type">
                            <p>Scientific Books</p>
                        </div>
                    </div>
                </a>
               
            </div>
        </div>
    </section>
    
</body>
</html>