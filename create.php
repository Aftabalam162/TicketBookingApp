<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("location: login.php");
}

$connect = mysqli_connect('localhost', 'root', '', 'bytdb');

error_reporting(0);
$name = $_POST['passenger'];
$gender = $_POST['gender'];
$origin = $_POST['origin'];
$destination = $_POST['destination'];

$email = $_SESSION['email'];


$createQuery = "insert into bookings (date, name, email, gender, origin, destination) values (now(), '$name','$email','$gender', '$origin', '$destination')";

if (empty($name)){
    $check = true;
} else{
    $createResult = mysqli_query($connect, $createQuery);
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
                <li><a href="signup.php">Signup</a></li>
                <li><a href="login.php">Login</a></li>
                <li style="float: right"><a href="logout.php">Logout</a></li>
                <li style="border: 3px black solid; border-radius: 5px"><a href="create.php">Create</a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="delete.php">Delete</a></li>
            </ul>
        </nav> 
        <div  class="container">
        <?php
        if ($createResult == 1){ ?>
        <p> Booking Done! </p>
        <?php } else if ($check) {
            
            } else {
                echo "Connection Failed! Please try again later :("; 
            } 
            
        ?>
        <h2>Safe and Secure Ticket Booking Service</h2> 
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi ipsam rerum, in necessitatibus laborum ab beatae, nostrum quam distinctio adipisci totam quisquam excepturi non expedita praesentium neque sint tempore velit blanditiis? Odio excepturi facere laudantium quaerat, deleniti mollitia nesciunt animi provident, repellendus fuga consequuntur debitis impedit explicabo, eius non eligendi!</p>
        <div class="form">
        <form action="create.php" method="post">
        <table>
            Passenger Details: <br>
            <tr>
                <td>Name </td>
                <td><input type="text" name="passenger" required/> </td>
            </tr>
            <tr>
                <td>Gender </td>
                <td><input type="radio" name="gender" value="Male" />Male
                <input type="radio" name="gender" value="Female"/>Female 
                <input type="radio" name="gender" value="Non-Binary"/>Non-Binary</td>
            </tr>
            <tr>
                <td>Email </td>
                <td ><input type="text" name="email" value="<?php echo $email ?>" readonly></td>
            </tr>
            <tr>
                <td>Origin</td>
                <td><input type="text" name="origin" required/></td>
            </tr>
            <tr>
                <td>Destination</td>
                <td><input type="text" name="destination" required/></td>
            </tr>


            <tr>
                <td><input type="submit" value="Book Seat" /></td>
            </tr>
        </table>
        </form>
        </div>
        </div>
    </body>
</html>

        