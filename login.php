<?php
    session_start();
    $show_error=false;

    include "connect.php";
    include "class.php";

    if(isset($_GET['login'])  and isset($_SESSION['show_active_form'])){
        unset($_SESSION['show_active_form']);
    }

    if(isset($_POST['active'])){
        $active_user= new login();
        $active_user->connect_db($host , $username , $password , $database);
        $active_user->active_account($_POST['act_code']);
    }
    
    if(isset($_POST['submit'])){
        $myDB= new login();
        $myDB->login_data_error($_POST['email'] , $_POST['password']);
        if($myDB->error===false){
            $myDB->connect_db($host , $username , $password , $database);
            $myDB->login_permission();
            if($myDB->active==false){
                $_SESSION['show_active_form']=true;
            }
            else{
                if(isset($_SESSION['show_active_form']))
                    unset($_SESSION['show_active_form']);
            }
        }
    }


?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
	
	<link rel="stylesheet" href="boot/css/style.css">

	<link rel="stylesheet" href="style/mystyle.css">

    <link rel="stylesheet" href="style/styl.css">

	</head>
	<body style="background-image:url(image/alexander-grey-D_lsnqKA3PE-unsplash.jpg) ; background-size:cover;">
	<?php 
        include "header.php";
        if(isset($_POST['submit']) and isset($myDB)){
            $show_error=true;
            
            if($myDB->notExist_error===true){
                echo '<div class="error"><span>Worng Email or Password &#10071;</span></div>';
            }
        }
    ?>
	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(image/1234.jpg);"></div>
			      		
						<div class="login-wrap p-4 p-md-5">
                            <?php if(!isset($_SESSION['show_active_form'])){ ?>
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Login</h3>
								</div>
							</div>
							<form action="#" class="signin-form" method="POST">						

								<div class="form-group mb-3">
									<label class="label" for="name">Email</label>
									<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Email ..." required value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
									<?php
                                        if($show_error==true){
                                            if($myDB->email_error===true)
                                                echo '<div class="error"><span>check your Email &#10071;</span></div>';
                                        }
                                    ?>
								</div>

								<div class="form-group mb-3">
									<label class="label" for="password">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" required value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>">
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3" value="Login">
								</div>
							
							</form>
							<p class="text-center">Dont have and account ? <a href="signin.php">Sign-in</a></p>
                            <?php
                                } 
                                if(isset($_SESSION['show_active_form'])){
                                  
                            ?>

                            <div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Active your account:</h3>
								</div>
							</div>
							<form action="#" class="signin-form" method="POST">						

								<div class="form-group mb-3">
									<label class="label" for="name">Enter your acctivation code:</label>
									<input type="text" name="act_code" class="form-control" placeholder=" Activation-Code ..." required >
									<?php
                                        if(isset($active_user)){
                                            if($active_user->activation_error===true);
                                                echo '<div class="error"><span>Wrong activation-code &#10071;</span></div>';
                                    
                                        }
                                    ?>
								</div>

								<div class="form-group">
									<input type="submit" name="active" class="form-control btn btn-primary rounded submit px-3" value="Active">
								</div>
							
							</form>
                            <p class="text-center">Back to Login page <a href="login.php?login='login'">Login</a></p>
                            <?php
                                    }
                                
                            ?>
						</div>
		      		</div>
				</div>
			</div>
		</div>
	</section>
    
  <script src="boot/js/jquery.min.js"></script>
  <script src="boot/js/popper.js"></script>
  <script src="boot/js/bootstrap.min.js"></script>
  <script src="boot/js/main.js"></script>

	</body>
</html>

