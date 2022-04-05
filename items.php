<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FindersKeepers Home</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        //header
        session_start();
        include "dynamic/DBController.php";
        UpdateUserVars($_SESSION['username'],$_SESSION['password']);    
        $lastlogin = $_SESSION['lastlogin'];
        if (isset($_SESSION['loggedin'])) {
            if ($_SESSION['loggedin'] == 1) { 
                if ($_SESSION['role'] == 1) {
                    include("static/header3.html");
                }else {
                    include("static/header2.html");
                }
            } else {
                include("static/header1.html");
            }
        }                           
        // Store data in session variables
        
        ?>
        <center>
            <h2><?php echo "Hi " . $_SESSION['FullName']?></h2>
            <br><br>
        </center>
    
    <!-- *********************************  PROFILE INFORMATION, LEFT SECTION ******************************* -->    
    <div class="small-container">
		<div class="row">
			<div class="col-3">
            <center><h3>Upload Item Information:</h3></center>
                <form method="post" action="additem.php" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" style="width:20em;" placeholder="Enter your Title" />
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" style="width:20em;" placeholder="Enter your Description" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" style="width:20em;" placeholder="Enter your Price" />
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location" style="width:20em;" placeholder="Enter your Location" />
                    </div>
                    <div class="form-group">
                        <label>File Upload</label>
                        <input type="file" name='fileupload' id="fileupload" >
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" style="width:10em; margin:0;" value="Submit"><br><br>
                    </div>
                </form>
            </div>
            
            <?php
                if(isset($_POST['submit'])){
                    $uploaddir = 'images/';
                    $uploadfile = $uploaddir . basename($_FILES['fileupload']['name']);

                    $filename=basename($_FILES['fileupload']['name']);

                    $title = $_POST["title"];
                    $description = $_POST["description"];
                    $price = $_POST["price"];
                    $location = $_POST["location"];
                    $sql = "insert into items (title, description, price, location,filename) values(?,?,?,?,?)";
                    $statement = $pdo -> prepare($sql);
                    try{
                        $statement -> execute(array($title, $description, $price, $location,'test'));
                        echo "Insert Successfull";
                    }
                    catch(Exception $E){
                        die($E);
                        exit;
                    }

                    




                    try{
    
                        move_uploaded_file($_FILES['fileupload']['tmp_name'], $uploadfile);
                        print_r($_FILES);
                        die(); 
    
                    }catch(Exception $e)
                    {
                        echo "File upload failed\n";
    
                        exit;
                    }


                    /*$firstname = $_POST['fname'];
                    $lastname = $_POST['lname'];
                    $email = $_POST['email'];
                    $phonenum = $_POST['phonenum'];
                    if ($_POST['password'] == "**********"){
                        $password = $_SESSION['password'];
                    } else {
                        $password = $_POST['password'];
                        $_SESSION['password'] = $password;
                    }
                    $userID = $_SESSION['userID'];
                    $query = "UPDATE users SET fname = '$firstname', lname = '$lastname', email = '$email', phonenum = '$phonenum', password = '$password'
                    WHERE userID = '$userID' ";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); */
            ?>
                
            <script type="text/javascript">
                alert("Upload Successful.");
               // window.location = "items.php";
            </script>
            <?php
                }
            ?>



        </div>
    </div>

    

        <?php
        //footer
        include("static/footer.html");
        ?>
    </body>
</html>