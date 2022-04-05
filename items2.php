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
        $fileupload_err = "";                           
        // Store data in session variables
        
        ?>
        <center>
            <h2><?php echo "Hi " . $_SESSION['FullName'] . $fileupload_err?></h2>
            <br>
        </center>
    
    <!-- *********************************  PROFILE INFORMATION, LEFT SECTION ******************************* -->    
    <div class="small-container">
		<div class="row">
			<div class="col-3">
            <center><h3>Upload Item Information:</h3></center>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" id= "title" name="title" style="width:20em;" placeholder="Enter your Title" />
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
                        <input type="file" name='fileToUpload' id="fileToUpload" ><br>
                        
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" style="width:10em; margin:0;" value="Submit"><br><br>
                    </div>
                </form>
                
            </div>
        </div>
        <div class="row">  
            <div class="col-3">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $target_dir = "img/";
                    $fdate = time();
                    $target_file = $target_dir . $fdate . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    
                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        if($check !== false) {
                            //$fileupload_err =  "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            $fileupload_err =  "File is not an image.";
                            $uploadOk = 0;
                        }
                    }
                    
                    // Check if file already exists
                    if (file_exists($target_file)) {
                        $fileupload_err =  $fileupload_err . "<br> Sorry, file already exists.";
                        $uploadOk = 0;
                    }
                    
                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                        $fileupload_err =  $fileupload_err . "<br> Sorry, your file is too large.";
                        $uploadOk = 0;
                    }
                    
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                        $fileupload_err =  $fileupload_err . "<br> Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                    
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        $fileupload_err =  $fileupload_err . "<br> Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            $fileupload_err =  $fileupload_err . "<br> The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        } else {
                            $fileupload_err = $fileupload_err . "<br> Sorry, there was an error uploading your file.";
                        }
                    }
                }
                echo $fileupload_err;  
            ?>
            </div>
        </div>
        
    </div>

    

        <?php
        //footer
        include("static/footer.html");
        ?>
    </body>
</html>