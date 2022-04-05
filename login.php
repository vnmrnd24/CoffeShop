<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FindersKeepers Login</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
    include ("static/header1.html");
?>

    <div class="small-container2">
        <div class="col-2"> 
            <h1 class="title">Login</h1>
            <p>Please fill in your credentials to login.</p><br>
        </div>    
    </div>

    <div class="row">
        <div class="small-container2">
            <form action="login2.php" method="post">
                <?php 
                    if (isset($_GET['error'])) { 
                ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" placeholder="User Name" class="form-control"><br>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control"><br> 
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <p>Don't have an account? <button onclick="location.href='register.php'" type="button" class="btn btn-primary" >Register</button>.</p><br>        
                </div>                
            </form>
        </div>
    </div>

    <!--------- FOOTER --------->
	<?php
        include("static/footer.html");
    ?>
</body>
</html>