<?php

    $connect = mysqli_connect('localhost', 'root', '', 'bytdb');

    if ($_SERVER["REQUEST_METHOD"] == 'POST'){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $existSql = "select * from logins where username = '$username' or email = '$email'";
        $result = mysqli_query($connect, $existSql);
        $numRows =  mysqli_num_rows($result);
        if ($numRows > 0){
            $exist = true;    
        } else {
            $exist = false;
        }

        if ($exist == false){
            $sql = "insert into logins (username, email, password) values ('$username', '$email', '$password')";

            $result = mysqli_query($connect, $sql);

            if ($result){
                echo "Success you are now registered! Please login to book your ticket";
            } else {
                echo 'Sorry for the inconvenience! We are not able to connect with server :(';
            }
        } else {
            $emailReason = "select * from logins where email = '$email'";
            $emailResult = mysqli_query($connect, $emailReason);

            $emailNum = mysqli_num_rows($emailResult);
            if ($emailNum > 0){
                echo "Email already exists in our database. Please login with your credentials";
            } else {
                echo "Username is already taken";
            }
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
                <li style="border: 3px black solid; border-radius: 5px"><a href="signup.php">Signup</a></li>
                <li><a href="login.php">Login</a></li>
                <li style="float: right"><a href="logout.php">Logout</a></li>
                <li><a href="create.php">Create</a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="delete.php">Delete</a></li>
            </ul>
        </nav>
        <div class="container">
            <h1>Signup to book your ticket</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi soluta illo quos voluptate aperiam tempora possimus itaque, ad aliquid dolor dignissimos. Temporibus, praesentium eligendi quisquam aliquid aliquam libero nulla, rem, adipisci numquam dolores modi sint ratione voluptatum tenetur. Totam quo architecto asperiores minus eligendi laboriosam ratione natus quae esse deserunt, autem est a incidunt itaque, iure voluptates ex impedit doloremque praesentium ipsum, iste alias. Architecto ad vitae dolorum, aliquam quasi unde doloribus quisquam labore veniam ex nemo quaerat odit optio alias provident non quod sint tempore perferendis. Perferendis, voluptatem aut quod blanditiis, assumenda exercitationem, eius non adipisci similique eligendi harum!</p>
            <div class="form">
            <form action='signup.php' method='post'>
            <table>
                <tr>
                    <td> Username </td>
                    <td> <input type="text" name="username"> </td>
                </tr>
                <tr>
                    <td> Email </td>
                    <td> <input type="email" name="email"></td>
                </tr>
                <tr>
                    <td> Password </td>
                    <td> <input type="password" name="password"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Sign Up"></td>
                </tr>
            </table>
            </form>
            </div>
        </div>
    </body>
</html>