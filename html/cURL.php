<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" title="style"/>
</head>

<body style="background-color: #b3f8ff">
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
                <li><a href="index.html">Home</a></li>
                <li><a href="About.html">About</a></li>
                <li><a href="Services.html">Services</a></li>
                <li><a href="News.html">News</a></li>
                <li><a href="Contact.php">Contacts</a></li>
                <li><a href="Secure.html">Secure</a></li>
                <li><a href="User.html">User</a></li>
                <li><a href="Database.php">Data</a></li>
                <li class="selected"><a href="cURL.php">cURL</a></li>
                <li><a href="ListOfUsers.php">UserList</a> </li>
            </ul>
        </div>
    </div>
    <div id="site_content">
<!--        <div class="sidebar">-->
<!--            <!--left for future-->-->
<!--            <h1>This area is under construction...</h1>-->
<!--        </div>-->
        <div id="content">
            <h1>CURL</h1>
            <?php
//
//            $curl_handle = curl_init();
//            curl_setopt($curl_handle, CURLOPT_URL, "http://www.tokcao.com/ListOfUsers.php");
//            curl_setopt($curl_handle, CURLOPT_HEADER, 0);
//            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
//            $contents = curl_exec($curl_handle);
//            curl_setopt($curl_handle, CURLOPT_URL, "http://cmpe272.jinxiaoting.com/Customers.html");
//            $contents = $contents . "," . curl_exec($curl_handle);
//            echo "<br/>";
//            curl_close($curl_handle);
//            foreach (explode(",", $contents) as $content) {
//                echo $content . "<br/>";
//            }

            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, "http://cmpe272.jinxiaoting.com/Customers.html");
            curl_setopt($curl_handle, CURLOPT_HEADER, 0);
            curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
            $contents = curl_exec($curl_handle);
            curl_setopt($curl_handle, CURLOPT_URL, "http://www.tokcao.com/ListOfUsers.php");
            $contents = $contents.",".curl_exec($curl_handle);
            echo "<br/>";
            curl_close($curl_handle);
            foreach (explode(",",$contents) as $content) {
                echo $content."<br/>";
            }

            ?>

        </div>
    </div>
</div>
</body>
</html>
