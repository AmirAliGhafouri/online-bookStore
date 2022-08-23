<?php
    session_start();
//___________________________permission to enter
    $subscription=false;
    if(!isset($_SESSION['user_login'])){
        header("location:index.php");
    }
    $id=$_SESSION['user_login'];

    $show_form=true;
    include "class.php";
    include "connect.php";

//____________________________ check if user have subscription or nit
    $mysql= new mysqli($host , $username , $password , $database);
    $sql="SELECT subscription FROM user WHERE user_ID='$id' AND subscription='yes'";
    $resault=$mysql->query($sql);
    $mysql->close();
    if($resault->num_rows>0){
        $subscription=true;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online Book-Store</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
	
	<link rel="stylesheet" href="boot/css/style.css">

	<link rel="stylesheet" href="style/mystyle.css">

    <link rel="stylesheet" href="style/styl.css">

    <script>
        function expiration(optiontag){
            let opt_tg=optiontag.value;
            if(opt_tg=="day"){
                document.getElementById('cost').innerText="Cost 10$"
            }
            if(opt_tg=="week"){
                document.getElementById('cost').innerText="Cost 50$"
            }
            if(opt_tg=="month"){
                document.getElementById('cost').innerText="Cost 200$"
            }
        }
    </script>
</head>
<body style="background-image:url(image/alexander-grey-D_lsnqKA3PE-unsplash.jpg) ; background-size:cover;">
<?php 
        include "header.php"; 
        if(isset($_POST['submit']) and $subscription==false){
            
//____________ save payments data   
            
            $card_number=$_POST['card_number'];
            $expiration=$_POST['expiration'];
            $cost="";
            if($expiration=="day")
                $cost=10;
            if($expiration=="week")
                $cost=50;
            if($expiration=="month")
                $cost=200;
            $myDB = new loged_user();
            $myDB->connect_db($host , $username , $password , $database);
            $myDB->subscribtion_history($id , $card_number , $expiration , $cost);
            
            echo "
                <div style='color:darkgreen;background-color: #c1ffb0;padding:7px; font-weight:bold;border: 2px solid darkgreen; margin-top:20px;'>
                    <p>Your subscription has been successfully done&#9989;</p>
                    <p>now you can download any book you want for a week</p>
                </div>
                <p style='background-color:cyan;color:blue; text-align:center;padding:10px;'>Moving to main page ...</p>
                ";
            $show_form=false;
            header("refresh:2;url=index.php");
        }    

//____________ Preventing to subscrib because of having subscribtion
        else if($subscription==true){
            $show_form=false;
            echo "<div style='text-align:center; color:darkgreen;background-color: #c1ffb0;padding:7px; font-weight:bold;border: 2px solid darkgreen; margin-top:20px;'>
            <p>You already have subscription</p>
            </div>
            <p style='background-color:cyan;color:blue; text-align:center;padding:10px;'>Moving to main page ...</p>
            ";
            header("refresh:2;url=index.php");     
        }

        if($show_form==true){
    ?>
    <section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(image/pexels-dom-j-45111.jpg);"></div>
			      		
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Buy subscription </h3>
									<h4 class="mb-4" id="cost">Cost: 10$</h4>
								</div>
							</div>
							<form action="#" class="signin-form" method="POST">
                                <div class="form-group mb-3">
									<label class="label">Choose the amount of time you want </label>
                                    <select name="expiration" class="selection">
                                        <option value="day" onclick="expiration(this)"> One DAY</option>
                                        <option value="week" onclick="expiration(this)"> One Week</option>
                                        <option value="month" onclick="expiration(this)"> One Month</option>
                                    </select>
                                </div>

								<div class="form-group mb-3">
									<label class="label" for="name">Credit card number</label>
									<input type="number" name="card_number" class="form-control" placeholder="Credit card number ..." required>
								</div>

								<div class="form-group mb-3">
									<label class="label" for="password">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>

								<div class="form-group">
									<input type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3" value="Buy">
								</div>
							
							</form>
							
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