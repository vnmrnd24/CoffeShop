<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FindersKeepers About</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        //header
        include_once("profile.php");
        session_start();
        $username = $_SESSION["username"];                            
        $password = $_SESSION["password"];
        $login = new Profile();
        if ($login->login($username, $password)) {
            $_SESSION["profile"] = serialize($login);
            include("static/header2.html");
        } else {

            include("static/header1.html");
        }
        
        ?>
        
        <div class="small-container">
            <div class="row">
            
                <div class="col-3">
                    <h3 class=title>Daniel Shields</h3>
                    <p>Working towards a CIT Degree</p>    
                    <p>Has 3 wee ones and no sleep.</p>
                    <p>Listens to audible books while working.</p>
                </div>

                <div class="col-3">
                    <h3 class=title>Jose Labastida</h3>
                    <p>Working towards a CIT Degree</p>    <br><br>
                    <p><p></p></p>
                </div>

                <div class="col-3">
                    <h3 class=title>Alex Shishkin</h3>
                    <p>Working towards a CIT Degree</p>    <br><br>
                </div>
            </div>
        </div>
    <div class="small-container2">
        <div class="row">
            <h3 class=title>Headquarters</h3>
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="500" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=644%206th%20St%20E,%20St%20Paul,%20MN%2055106&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br>

                        <style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style>
                </div>
            </div>
        </div>            
    </div>

        <?php
        include("static/footer.html");
        ?>
    </body>
</html>