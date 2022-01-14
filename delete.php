<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("location: login.php");
}

$connect = mysqli_connect('localhost', 'root', '', 'bytdb');

error_reporting(0);
$id = $_POST['id'];
$reason = $_POST['reason'];
$email = $_SESSION['email'];



$deleteQuery = "delete from bookings where id = $id";
$deleteResult = mysqli_query($connect, $deleteQuery);

$reasonQuery = "insert into cancel (id, reason, email, date) values ($id, '$reason', '$email', now())";
$resultReason = mysqli_query($connect, $reasonQuery);

if(empty($name)){
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
                <li><a href="update.php">Update</a></li>
                <li style="border: 3px black solid; border-radius: 5px"><a href="delete.php">Delete</a></li>
            </ul>
        </nav>
        <div class="container">
        <?php
        if ($deleteResult == 1){
            echo "Ticket Cancelled! We are sad to see you go :(";
        } else if ($check){
            
        } else {
            echo "We are not able to connect with server :(";
        }
        ?>
        <h2>Ticket Cancellation was never that easy!</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, vero possimus natus a aliquam commodi nobis recusandae tenetur laboriosam deleniti enim minus fuga soluta ipsa ad nemo quas debitis totam! Delectus veniam eius officia distinctio unde, atque odio nostrum. Alias laudantium nobis numquam saepe, sequi nam eligendi quidem animi consectetur?</p>
        <div class="form">
        <form action="delete.php" method="post">
        <table>
            Passenger Details: <br>
            <tr>
                <td>ID mentioned in booking details: </td>
                <td><input type="number" name="id" required/></td> 

            <tr>    
                <td>Reason</td>
                <td>
                    <input type='text' name ="reason" value=" - " required/> 
                </td>
            </tr>


            <tr>
                <td><input type="submit" value="Delete Booking"/></td>
            </tr>
        </table>
        </form>
        </div>
        </div>
    </body>
</html>
