<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'user_db';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(! $conn ) {
    die('Could not connect: ' . mysqli_error($conn));
}

//echo 'Connected successfully<br>';

$username = $password =$PassErr="";
if(!empty($_POST['Submit'])){
    if($_POST['password']===$_POST['password']){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sign_up = "INSERT INTO my_users (username,pass) 
                    VALUES ('$username','$password')";
        $retval = mysqli_query( $conn, $sign_up );
        header("Location: signin.php");
    } else {
        $PassErr = "Password didn't Match";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 30px;
        }
        p {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        form {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 3px;
            margin-bottom: 20px;
            background-color: #f7f7f7;
        }
        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #3e8e41;
        }
        .error {
            color: red;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group a {
            color: #4CAF50;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .input-group a:hover {
            color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill this form to create an account</p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="" Required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" value="" Required>
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm password" value="" Required>
            </div>
            <div>
                <input class="sbtn" type="submit" name="Submit" >
                <input class="rbtn" type="reset" name="Reset" ><span class="error"> <?php echo "$PassErr";?></span>
            </div>
        </form>
        <div class="input-group">
            Already have an account? <a href="./signin.php">login here</a>
        </div>
    </div>
</body>
</html>