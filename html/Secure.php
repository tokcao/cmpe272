<!DOCTYPE html>
<html>
<head>
    <title>
        Home Page
    </title>
    <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>
<body style = "background-color: #b3f8ff">

<div id="main">
    <div id="header">
        <div id="logo">
            <div id="logo_text">
                <h1><a href="index.html">Home Sweet Home</a></h1>
            </div>
        </div>
        <div id="menubar">
            <ul id="menu">
                <li><a href="index.html">Home</a> </li>
                <li><a href="About.html">About</a> </li>
                <li><a href="Services.html">Services</a> </li>
                <li><a href="News.html">News</a> </li>
                <li><a href="Contact.php">Contacts</a> </li>
                <li><a href="Secure.html">Secure</a> </li>
                <li><a href="Data.html">User</a> </li>
                <li><a href="Database.php">Data</a> </li>
            </ul>
        </div>
    </div>
    <div id="site_content">
        <div class="sidebar">
            <!--left for future-->
            <h3>This area is under construction...</h3>
        </div>
        <div id="content">
            <h1>Below is the list of registered users</h1>
            <?php
            extract($_POST);

            //Check if user has left USERNAME or PASSWORD field blank
            if(!$USERNAME || !$PASSWORD ){
                fieldsBlank();
                die();
            }

            //Check if the New USer button was clicked
            if(isset($NewUser)){

                //Open user.txt for writing using append mode
                if(!($file=fopen("user.txt","a"))){

                    //Print error message and terminate script
                    //execution if file cannot be opened
                    echo "<title>Error</title><p>Could not open user file</p>";
                    die();
                }

                //Write username and password to file and call function userAdded
                fputs($file,"$USERNAME,$PASSWORD\n");
                userAdded($USERNAME);
            }
            else {

                //If a new user is not being added, open file for reading
                if (!($file = fopen("user.txt", "r"))) {
                    echo "<title>Error</title><p>Could not open user file</p>";
                    die();
                }

                $userVerified = 0;

                if($USERNAME == "admin") {
                    if ($PASSWORD == "admin") {

                        echo "<p><Strong>Below is the list of registered users:</Strong><br/><br/></p>";

                        $file = fopen("user.txt", "r");

                        //Read each line in file and check username and password
                        while (!feof($file)) {

                            //Read line from file
                            $line = fgets($file, 255);

                            //Remove newline character from end of line
                            $line = chop($line);

                            //Split username and password
                            $field = explode(",", $line, 2);

                            echo "<p>$line<br/></p>";
                        }

                        fclose($file);
                    } else {
                        echo "Incorrect password for Admin account!";
                    }
                }
                else{

                    //Read each line in file and check username and password
                    while (!feof($file) && !$userVerified) {

                        //Read line from file
                        $line = fgets($file, 255);

                        //Remove newline character from end of line
                        $line = chop($line);

                        //Split username and password
                        $field = explode(",", $line, 2);

                        //Verify username
                        if ($USERNAME == $field[0]) {
                            $userVerified = 1;

                            //Call function checkPassword to verify user's password
                            if (checkPassword($PASSWORD, $field) == true) {
                                accessGranted($USERNAME);
                            } else {
                                wrongPassword();
                            }
                        }
                    }

                    //Call function accessDenied if username has not been verified
                    if(!$userVerified){
                        accessDenied();
                    }
                }
            }

            //Verify user password and return a boolean
            function checkPassword($userpassword, $filedata){
                if($userpassword == $filedata[1]){
                    return true;
                }
                else{
                    return false;
                }
            }

            //Print a message indicating the user has been added
            function userAdded($name){
                echo "<title>Thank you</title>
                    <p style='color: #2b9e13'>
                    <strong>You have been added to the user list, $name. <br/>
                    Enjoy the site!</strong>'</p>";
            }

            //Print a message indicating the user has been added
            function accessGranted($name){
                echo "<title>Thank you</title>
                    <p style='color: #2b9e13'>
                    <strong>Permission has been granted, $name. <br/>
                    Enjoy the site!</strong></p>";
            }

            //Print a message indication password is invalid
            function wrongPassword(){
                echo "<title>Access Denied</title>
                    <p style='color: #9e000a'>
                    <strong>You entered an invalid password.<br/>
                    Access has been denied!</strong></p>";
            }

            //Print a message indicating access has been denied
            function accessDenied(){
                echo "<title>Access Denied</title>
            <p style='color: #9e000a'>
            <strong>You were denied access to this server!.<br/></strong></p>";
            }

            //Print a message indicating that fields have been left blank
            function fieldsBlank(){
                echo "<title>Access Denied</title>
                    <p style='color: #9e000a'>
                    <strong>Please fill in all from fields!<br/></strong></p>";
            }
            ?>
        </div>
    </div>
</div>


</body>
</html>
