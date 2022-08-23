<?php
    session_start();

    if(!isset($_SESSION['user_login']))
        header("location:index.php");
    include "class.php";
    include "connect.php";

    $id=$_SESSION['user_login'];
    $myDB=new loged_user();
    $myDB->connect_db($host , $username , $password , $database);
    $myDB->user_info($id);

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
<body  style="background-image:url(image/alexander-grey-D_lsnqKA3PE-unsplash.jpg) ; background-size:cover;">
    <?php
        include "header.php";
        if(isset($myDB)){       
    ?>

        <div class="user-profile-container">
            <div class="user-profile-img">
                <?php
                    echo "
                        <img src='upload/profile_pic/$myDB->profile'>
                    ";
                ?>
            </div>
            <div class="user-profile-info">
                <div>
                    <?php
                        echo "
                            <p>Name :</p>
                            <p><strong>$myDB->fname  $myDB->lname</strong></p>
                        ";
                    ?>
                </div>
                   
                <div>
                    <?php
                        echo "
                            <p>Email :</p>
                            <p><strong>$myDB->email</strong></p>
                        ";
                    ?>
                </div>

                <div>
                    <?php
                        echo "
                            <p>Phone Number :</p>
                            <p><strong>$myDB->mobile</strong></p>
                        ";
                    ?>
                </div>

                <div>
                    <?php
                        echo "
                            <p>Subscription expires :</p>
                            <p><strong>$myDB->sub_end</strong></p>
                        ";
                    ?>
                </div>
            </div>

            <div class="user-profile-ncard">
                <p><strong>National Card</strong></p>
                <?php
                    echo "<img src='upload/nationalCard_pic/$myDB->n_card'>";
                ?>
            </div>

            <div class="user-profile-setting">
                <a href="edit.php" class="button">Edit Profile</a>
            </div>

            <div class="user-profile-table">
                <div>
                    <h2>Download History :</h2>
                    <table>
                        <tr>
                            <th>Book name</th>
                            <th>Date of Download</th>
                            <th>Picture</th>
                        </tr>
                        <?php
                            $myDB->download_info($id);
                        ?>
                    </table>
                </div>

                <div>
                    <h2>Payment History :</h2>
                    <table>
                        <tr>
                            <th>credit card number</th>
                            <th>Date of payment</th>
                            <th>Subscription type</th>
                            <th>Cost</th>
                        </tr>
                            <?php
                                $myDB->paymet_info($id);
                            ?>
                    </table>
                </div>
            </div>
        </div>

    <?php } ?>
</body>
</html>