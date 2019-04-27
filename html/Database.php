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
            </ul>
        </div>
    </div>
    <div id="site_content">
        <div class="sidebar">
            <!--left for future-->
            <h1>This area is under construction...</h1>
        </div>
        <div id="content">
            <h1>Search Results</h1>
            <?php

            extract($_POST);

            /** Build SELECT query */
            //                $query = "SELECT" . $select . " From Books";

            $servername = "localhost";
//            $servername = "127.0.0.1";
            $username = "tokcao";
            $password = "12345";
            $dbname = "userInfo";

//            $conn = new mysqli($servername, $username, $password, $dbname);
            $conn = mysqli_connect("127.0.0.1","tokcao","12345","userInfo");

            /** Connect to MySQL */
            if (!$conn) {
                echo "Error: Unable to connect to MySQL." . PHP_EOL;
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                die("Could not connect to database.");
            } else {
                if ($submit == "search") {
                    searchUser($firstname, $lastname, $email, $address, $homephone, $cellphone);
                } else if ($submit == "submit") {
                    createUser($firstname, $lastname, $email, $address, $homephone, $cellphone);
                } else {
                    echo "You have submitted nothing.";
                }
            }
//            $conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
//            $dbcon = mysqli_select_db($conn,DBNAME);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }



            function searchUser($firstname, $lastname, $email, $address, $homephone, $cellphone)
            {
                global $conn;
                $sql = "SELECT firstname, lastname, email, address, homephone, cellphone
                            FROM Users WHERE  
                            firstname like '%" . $firstname . "%' and
                            lastname like '%" . $lastname . "%' and
                            email like '%" . $email . "%' and
                            address like '%" . $address . "%' and
                            homephone like '%" . $homephone . "%' and
                            cellphone like '%" . $cellphone . "%'";

		$sql2 = "SHOW TABLES";

		if ($result = mysqli_query($conn, $sql)) {
                        /** Build table to display result */

                        echo "<table border=\"0\" cellspacing=\"0\"
                            style=\"height: 90px; width: 223px; font-size: 10pt;\" cellpadding=\"10\">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Homephone</th>
                                <th>Cellphone</th>
                            </tr>
                            </thead>";
 
                    /** Fetch each record in result set */
                    for ($counter = 0; $row = mysqli_fetch_row($result); $counter++) {

                       echo "<tr>";

                        foreach ($row as $key => $value) {
                            echo "<td>$value</td>";
                        }

                        echo "<tr>";
                    }
                } else {
                    echo "Could not execute query!<br>";
                    die(mysqli_error($conn));
                }
            }

            function createUser($firstname, $lastname, $email, $address, $homephone, $cellphone)
            {
                global $conn;
                $sql = "INSERT INTO Users(firstname,lastname,email,address,homephone,cellphone) VALUES
                            ('$firstname','$lastname','$email','$address','$homephone','$cellphone')";
                if ($conn->query($sql) === TRUE) {
                    echo "<strong>You have been added to database.</strong>";
                } else {
                    echo "<strong>Failed to add to database.</strong><br>";
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }


            mysqli_close($conn);

            ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
