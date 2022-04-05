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
        if(isset($_POST['update'])){
            print_r($_POST);
            $ID=$_POST['itemid'];
            $title=$_POST['itemtitle'];
            $description=$_POST['itemdescription'];
            $price=$_POST['itemtprice'];
            $location=$_POST['itemlocation'];
            $filename=$_POST['itemfilename'];
            $sql="update items set title=?,description=?,price=?,location=?,filename=? where itemid=?";
            $statement=$pdo->prepare($sql);
            try{

            
            $statement->execute(array($title, $description, $price, $location, $filename, $ID));
            }catch(Exception $E){
                die($E);
                exit;
            }
            //header("location:adminmanagejl.php");
        }                           
        // Store data in session variables
        if(isset($_GET['delete'])){
            $sql="delete from items where itemID = ?";
            $statement=$pdo->prepare($sql);
            $statement->execute(array($_GET['delete']));
            header("location:adminmanagejl.php");
        }
        ?>
        <center>
            <h2><?php echo "Hi " . $_SESSION['FullName']?></h2>
            <br><br>
        </center>
    
    <!-- *********************************  PROFILE INFORMATION, LEFT SECTION ******************************* -->    
    <div class="small-container">
		<div class="row">
			<!--<div class="col-3">-->
            <center><h3>Edit Items:</h3></center>
                <form action="adminmanagejl.php" method=POST >
               <table border=1>
                   <th>Title</th>
                   <th>Description</th>
                   <th>Price</th>
                   <th>Location</th>
                   <th>File Name</th>
                   <?php
                    $sql="select * from items";
                    foreach($pdo->query($sql) as $row){
                        $itemid=$row['itemID'];
                        echo "<tr>";
                        echo "<td><input type=text name=itemtitle$itemID value='".$row["title"]."'</td>";
                        echo "<td><input type=text name=itemdescription$itemID value='".$row["description"]."'</td>";
                        echo "<td><input type=text name=itemprice$itemID value='".$row["price"]."'</td>";
                        echo "<td><input type=text name=itemlocation$itemID value='".$row["location"]."'</td>";
                        echo "<td><input type=text name=itemfilename$itemID value='".$row["filename"]."'</td>";
                        echo "<input type=hidden name=itemid value=$itemid >";
                        //echo "<td><a href='adminmanage.php?update=".$row["itemID"]."'>Update</a></td>";
                        echo "<td><input type=submit name=update value=Update ></td>";
                        echo "<td><a href='adminmanage.php?delete=".$row["itemID"]."'>Delete</a></td>";
                        echo "</tr>";
                    }

                   ?>
                   </table>    
                </form>
           <!-- </div>-->
            
                

                    




                    



        </div>
    </div>

    

        <?php
        //footer
        include("static/footer.html");
        ?>
    </body>
</html>