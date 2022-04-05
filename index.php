<?php 
//header
session_start(); 
if (isset($_SESSION['loggedin'])){
	if ($_SESSION['loggedin'] == 1) { 
		if ($_SESSION['role'] == 1) {
			include("static/header3.html");
		}else {
			include("static/header2.html");
		}
	} else {
		include("static/header1.html");
	}
} else {
	include("static/header1.html");
}  
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CofeeBot Home</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!---------- Featured Categories ---------->
<div class="Backgrounddiv">

	<div class="small-container">
	<h2 class="title">Welcome to CoffeeBot!</h2>
		<div class="row">
			
			<p>The best energy for the day starts with the coffee Aroma.</p>
		</div>
	</div>
	



<!-------- Featured Products --------->
	<div class="small-container">
		<h2 class="title">New Drinks</h2>
		<div class="row">
			
		</div>
		
		
	</div>
</div>
</body>
</html>		

<?php
    //footer
    include("static/footer.html");
?>