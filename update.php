<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("location: login.php");
}

$connect = mysqli_connect('localhost','root', '', 'bytdb');

error_reporting(0);
$id = $_POST['id'];
$change = $_POST['change'];
$value = $_POST['value'];


$updateQuery = "update bookings set $change = '$value', date = now() where id = $id";
$updateResult = mysqli_query($connect, $updateQuery);

if (empty($value)){
    $check = true;
}

?>


<html>
    <head>
        <title>BYT - Book Ticket</title>
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

        </style>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="welcome.php">Home</a></li>
                <li ><a href="signup.php">Signup</a></li>
                <li><a href="login.php">Login</a></li>
                <li style="float: right"><a href="logout.php">Logout</a></li>
                <li><a href="create.php">Create</a></li>
                <li style="border: 3px black solid; border-radius: 5px"><a href="update.php">Update</a></li>
                <li><a href="delete.php">Delete</a></li>
            </ul>
        </nav> 
        <div class="container">
        <?php
        if ($updateResult == 1){
            echo "Update Done!";
        } else if ($check){
            
        } else{
            echo "We are not able to connect with server :(";
        }

        ?>
        <h2>Update Your Ticket in Seconds!</h2>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat atque odit libero eius alias sed excepturi vitae at eum nesciunt ullam perferendis numquam, quod culpa maiores nemo rem facilis dolores! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum aliquid ex esse, reiciendis quam quaerat cum itaque laudantium nihil culpa cupiditate iste perspiciatis, corrupti numquam consequuntur id ducimus vitae earum quos rerum cumque magnam soluta iusto. Autem in ipsum molestias reprehenderit sed eligendi iure itaque nam architecto soluta! Quisquam, nihil. </p>
        <div class="form">
        <form action="update.php" method="post">
        <table>
            Passenger Details: <br>
            <tr>
                <td>ID mentioned in booking details: </td>
                <td><input type="number" name="id" required/></td> 

            <tr>    
                <td>
                    <select name='change'>
                        <option value='name'>Name</option>
                        <option value='gender'>Gender</option>
                        <option value='origin'>Origin</option>
                        <option value='destination'>Destination</option>
                    </select>
                </td>
                <td>
                    <input type='text' name ='value' required/> 
                </td>
            </tr>


            <tr>
                <td><input type="submit" value="Update Booking"/></td>
            </tr>
        </table>
        </form> 
    </div>
    </div>
    </body>
</html>
