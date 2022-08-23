<?php
    include "class.php";
    include "connect.php";
    $show_form=true;
    $show_error=false;
    if(isset($_POST['submit'])){

        $profile_pic_name="x";
        $ncard_pic_name="x";
        $profile_pic_tmpName="";
        $ncard_pic_tmpName="";

        if(isset($_FILES['picture'])){
            $profile_pic_name=$_FILES['picture']['name'];
            $profile_pic_tmpName=$_FILES['picture']['tmp_name'];
        }
        if(isset($_FILES['n_card'])){
            $ncard_pic_name=$_FILES['n_card']['name'];
            $ncard_pic_tmpName=$_FILES['n_card']['tmp_name'];
        }
        

        $myDB= new signin();
        $myDB->data_error($_POST['fname'] , $_POST['lname'] , $_POST['email'] , $_POST['mobile'] , $profile_pic_name , $ncard_pic_name , $_POST['password']);
        if($myDB->error==false){
            $myDB->upload($profile_pic_tmpName , $ncard_pic_tmpName , $profile_pic_name , $ncard_pic_name);
            $myDB->connect_db($host , $username , $password , $database);
            $myDB->insert_data();
            if($myDB->show_form==false)
                $show_form=false;
        }
    }
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Sign-in</title>
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
            if($myDB->empty_error===true){
                echo '<div class="error" style="margin-top:20px;"><span style="padding:5px;">Please complete all requested information &#10071;</span></div>';
            }
            if($myDB->email_exist_error===true)
                echo '<div class="error" style="margin-top:20px;"><span style="padding:5px;">This Email already exist &#10071;</span></div>';

            if($myDB->successful_signin===true){
                echo "<div style='margin:auto; text-align:center; width:350px;'>";
                echo "<div style='color:darkgreen;background-color: #c1ffb0;padding:7px; font-weight:bold;border: 2px solid darkgreen; margin-top:20px;'>";
                echo "<p>Your account has been created successfully&#9989;</p>";
                echo "<p>Now you can login with your activation code</p>";
                echo "<br><span style='color:blue;background-color:cyan; padding:5px; margin-top:10px;'>activation code : $myDB->active</span><br>";
                echo "<br><a href='index.php' style='color:blue;'><button>Link to main page</button></a>";
                echo "</div>";
                echo "</div>";
            }

        }

        if($show_form==true){
    ?>
	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(image/1234.jpg);"></div>
			      		
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Sign up</h3>
								</div>
							</div>
							<form action="#" class="signin-form" method="POST" enctype="multipart/form-data">
								<div class="form-group mb-3">
									<label class="label" for="name">Firstname</label>
									<input type="text" name="fname" class="form-control" placeholder="Firstname ..." value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];} ?>">
									<?php
										if($show_error==true){
											if($myDB->fname_error===true)
												echo '<div class="error"><span>You can only use A-Z,a-z for firstname &#10071;</span></div>';
											if($myDB->fname_lengh_error===true)
												echo '<div class="error"><span>The firstname must have less than 25 characters &#10071;</span></div>';
										}
									?>
								</div>

								<div class="form-group mb-3">
									<label class="label" for="name">Lastname</label>
									<input type="text" name="lname" class="form-control" placeholder="Lastname ..." value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];} ?>">
									<?php
										if($show_error==true){
											if($myDB->lname_error===true)
												echo '<div class="error"><span>You can only use A-Z,a-z for lasttname &#10071;</span></div>';
											if($myDB->lname_lengh_error===true)
												echo '<div class="error"><span>The lasttname must have less than 25 characters &#10071;</span></div>';
										}
									?>
								</div>

								<div class="form-group mb-3">
									<label class="label" for="name">Email</label>
									<input type="text" name="email" class="form-control" placeholder="Email ..." value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
									<?php
										if($show_error==true){
											if($myDB->email_error===true)
												echo '<div class="error"><span>Wrong email &#10071;</span></div>';
										}
									?>
								</div>

								<div class="form-group mb-3">
									<label class="label" for="name">Phone Number</label>
									<input type="text" name="mobile" class="form-control" placeholder="Phone Number ..." value="<?php if(isset($_POST['mobile'])){echo $_POST['mobile'];} ?>">
									<?php
										if($show_error==true){
											if($myDB->mobile_error===true)
												echo '<div class="error"><span>Wrong phone number &#10071;</span></div>';
										}
									?>
								</div>

                                <div class="form-group mb-3">
                                    <p>Upload your picture</p>
                                    <label for="pic" class="file">Choose image <i class="fa-solid fa-image"></i></label>
                                    <input type="file" name="picture" id="pic" accept="image/*" style="display: none;">
									<?php
										if($show_error==true){
											if($myDB->empty_pic_error===true)
												echo '<div class="error"><span>choose your picture &#10071;</span></div>';
										}
									?>
								</div>
                                    
                                <div class="form-group mb-3">
                                    <p>Upload your national-card image</p>
                                    <label for="n_code" class="file">Choose image <i class="fa-solid fa-image"></i></label>
                                    <input type="file" name="n_card" id="n_code" accept="image/*" style="display: none;">
									<?php
										if($show_error==true){
											if($myDB->empty_img_error===true)
												echo '<div class="error"><span>choose your n_card image &#10071;</span></div>';
										}
									?>
                                </div>

								<div class="form-group mb-3">
									<label class="label" for="password">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>">
									<?php
										if($show_error==true){
											if($myDB->pass_error===true)
												echo '<div class="error"><span>The password must have less than 20 characters &#10071;</span></div>';
										}
									?>
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3" value="Sign In">
								</div>
							
							</form>
							<p class="text-center">Already have an account ? <a href="login.php">Login</a></p>
						</div>
		      		</div>
				</div>
			</div>
		</div>
	</section>
    <?php } ?>
  <script src="boot/js/jquery.min.js"></script>
  <script src="boot/js/popper.js"></script>
  <script src="boot/js/bootstrap.min.js"></script>
  <script src="boot/js/main.js"></script>

	</body>
</html>

