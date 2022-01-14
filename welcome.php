<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("location: login.php");
}

$connect = mysqli_connect('localhost', 'root', '', 'bytdb');

$username = $_SESSION['username'];

$emailQuery = "select * from logins where username = '$username'";

$emailResult = mysqli_query($connect, $emailQuery);

$emailRow = mysqli_fetch_assoc($emailResult);

$email = $emailRow['email'];

$_SESSION['email'] = $email; // shows error when signed up user again visits after logging out

$showQuery = "select * from bookings where email = '$email'";

$showResult = mysqli_query($connect, $showQuery);
$num = mysqli_num_rows($showResult);

?>


<html>
    <head>
        <title>Book your ticket now!</title>
        <style>
        * {
            background-color: #F4F9F9;
            font-family: 'Ubuntu', sans-serif;
            box-sizing: border-box;
            line-height: 30px;
           
        }

        ul {
              list-style-type: none;
              margin: 20px auto;
              width: 75%;
              padding: 15px;
              overflow: hidden;
              background-color: #F4F9F9;
              border:5px solid black;
              border-radius: 8px;
             }

        li {
              float: left;
              margin: 0;

            }

        li a {
              display: block;
              color: black;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
        }

            /* Change the link color to #111 (black) on hover */
        li a:hover {
              background-color: #CCF2F4;
            }

        .container {
            
            width: 75%;
            margin: 25px auto;
            border:5px solid black;
            border-radius: 8px;
            padding: 50px;
            margin: auto;
            text-align: center;
        }

        input[type="submit"] {
            width: 100%;
        }

        .form {
            margin :auto;
            width: 27%;
            border: solid 2px black;
            border-radius: 3px;
            padding: 10px;
        }

        table tr td {
            width: 200px;
            align-items: center;
            text-align: center;
            
        }


        </style>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <nav>
            <ul>
                <li style="border: 3px black solid; border-radius: 5px"><a href="welcome.php">Home</a></li>
                <li><a href="signup.php">Signup</a></li>
                <li><a href="login.php">Login</a></li>
                <li style="float: right"><a href="logout.php">Logout</a></li>
                <li><a href="create.php">Create</a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="delete.php">Delete</a></li>
            </ul>
        </nav>
        <div class="container">
        <h1> Welcome <?php echo $_SESSION['username']?> </h1>
        <h3> Here are all the bookings done by you:</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni voluptates accusantium aspernatur ipsam placeat provident necessitatibus vero numquam, enim, quibusdam earum, neque inventore totam ipsa dolorem modi rerum quae obcaecati.</p>
        <table>
            <tr>
                <td>ID</td>
                <td>Date</td>
                <td>Name</td>
                <td>Gender</td>
                <td>Email</td>
                <td>Origin</td>
                <td>Destination</td>
            </tr>
            <?php 
            
            for ($i = 1; $i <= $num; $i++){
            $row = mysqli_fetch_assoc($showResult);
            echo "<tr><td> ". $row['id']." </td><td> ".$row['date']." </td><td> ".$row['name']." </td><td> ".$row['gender']." </td><td> ".$row['email']." </td><td> ".$row['origin']." </td><td> ".$row['destination']."</td></tr>";
            }
            ?>

        </table>
        </div>
    </body>
</html>