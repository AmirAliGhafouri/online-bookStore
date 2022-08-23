<?php
    $user_login=false;
    if(isset($_SESSION['user_login'])){
        $user_login=true;
    }
?>
<script src="https://kit.fontawesome.com/f2f0c7f07a.js" crossorigin="anonymous"></script>
<div class="top-bar">
    <div class="header-container">
        <div class="logo">
            <a href="../index.php" title="Main Page">
                <img src="../image/logo.png" alt="Logo">
            </a>
        </div>

        <div class="search">
            <form action="../search.php" method="POST">
                <input type="text" name="search" placeholder=" Search ..." required><input type="submit" name="srch_sub" value="Search" id="search">
            </form>
        </div>
    </div>

  
        <div class="topbar-button">
            <?php
                if($user_login==true){
                    echo '<a href="../subscription.php" class="button">Subscription <i class="fa-solid fa-money-check"></i></a>';
                    echo '<a href="../user_profile.php" class="button">Profile <i class="fa-solid fa-user"></i></a>';
                    echo '<a href="../logout.php" class="button">Logout</a>';

                    $user=new loged_user();
                    $user->connect_db($host , $username , $password , $database);
                    $user->profile_pic();
                    $profile=$user->profile;
                    echo "<div class='header-prf'><img src='../upload/profile_pic/$profile'></div>";
                }

                else{
            ?>
            <a href="../signin.php" class="button">Sign-in</a>
            <a href="../login.php" class="button">Login</a>
            <?php } ?>
        </div>


</div>