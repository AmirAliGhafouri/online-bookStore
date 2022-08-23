<?php
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("location:index.php");
    }
    include "connect.php";
    include "class.php";

    if(isset($_POST['submit'])){
        $id=$_SESSION['user_login'];
        $field=$_POST['field'];
        $new=$_POST['change'];
        $myDB= new loged_user();
        $myDB->connect_db($host , $username , $password , $database);
        $myDB->edit_info($field , $new , $id);
    }
    

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styl.css">
    <title>online-bookstore</title>
</head>
<body>
    <?php
        include "header.php";
        if(isset($myDB)){
            if($myDB->email_exist_error===true){
                echo "<div class='error'><p>this email already exist !!!</p></div>";
            }
        }
    ?>
    <div class="edit-form">
        <h2>Edit</h2>
        <form action="#" method="POST">
            <div>
                <span>Select the option you want to Edit</span>
                <select name="field" class="selection">
                    <option value="firstName"> First Name</option>
                    <option value="lastName"> Last Name</option>
                    <option value="email"> Email</option>
                    <option value="phoneNumber"> Phone Number</option>
                </select>
            </div>
            <div>
                <input type="text" name="change" placeholder=" New Value ..." required>
            </div>
            <div>
                <input type="submit" name="submit" value="Edit" class="button" id="submit">
            </div>
        </form>
    </div>
</body>
</html>