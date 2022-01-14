<?php

    $connect = mysqli_connect('localhost', 'root', '', 'bytdb');

    if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

                $sql = "select * from logins where password = '$password' and username = '$username'";

                $result = mysqli_query($connect, $sql);

                $num = mysqli_num_rows($result);
                if ($num == 1){
                    echo "Success! You are logged in and now you can book your ticket";
                    session_start();
                    $_SESSION['loggedin'] = true;


                    $_SESSION['username'] = $username; 
                    header("location: welcome.php");
                } else {
                    echo 'Invalid Credentials! Sign up with our site to book your ticket';
                }
            
        
    }

    

        

?>

<html>
    <head>
        <title> Book Your Ticket </title>
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
                <li style="border: 3px black solid; border-radius: 5px"><a href="login.php">Login</a></li>
                <li style="float: right"><a href="logout.php">Logout</a></li>
                <li><a href="create.php">Create</a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="delete.php">Delete</a></li>
            </ul>
        </nav>
        
        <div class="container">
            <h1>Please Login to Book Ticket</h1>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus tempora iure consectetur, culpa delectus perferendis natus doloremque nemo quidem, exercitationem deleniti id quos at vel unde, aut cum eaque modi perspiciatis quas tenetur? Culpa quae adipisci earum iste magni, amet autem necessitatibus reprehenderit consequuntur odit dolorum eligendi deserunt alias! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas nisi hic nobis consequatur tempora nemo consequuntur aspernatur quia quasi, cum at? Repudiandae sapiente temporibus doloribus incidunt rerum illum fugit debitis?</p>
            <div class="form">
        <form action='login.php' method='post'>
            <table>
                
                <tr>
                    <td> Username </td>
                    <td> <input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td> Password </td>
                    <td> <input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Log in"></td>
                </tr>
            </table>
        </form>
        </div> 
        </div>
    </body>
</html>