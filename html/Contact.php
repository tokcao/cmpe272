<!DOCTYPE html>
<html>
<head>
    <title>
        Home Page
    </title>
    <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>
<body style = "background-color: #b3f8ff">
<!--<h1 style="color: #65271c; text-align: center; font-family: Arial">-->
<!--Welcome to Asian Market!-->
<!--</h1>-->
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
                <li class="selected"><a href="Contact.php">Contacts</a> </li>
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
            <h1>Contact Us!</h1>
            <?php
            $handle = @fopen('contact.txt','r');
            if($handle){
                while(($buffer = fgets($handle, 4096)) !== false){
                    echo "<p>$buffer</p>";
                    echo "<br>";
                }
                if(!feof($handle)){
                    echo "<p>Error: unexpected fgets() fail</p>";
                }
                fclose($handle);
            }
            ?>
        </div>
    </div>
</div>


</body>
</html>