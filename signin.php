
<?php
session_start();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'user_db';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$username = $password= $msg= "";
if(!empty($_POST['submit'])){
  // /echo "hi";

  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $sql = mysqli_query($conn," SELECT * FROM my_users
                  WHERE username = '$username' && pass = '$password'");
  $num =mysqli_num_rows($sql);
    if($num>0){
      $row = mysqli_fetch_assoc($sql);
      
       $_SESSION['USER_ID'] = $row['ID'];
     $_SESSION['USER_NAME'] = $row['username'];

      header('location:welcome.php');
      exit();
  }else{
      $msg = "Please Enter Valid Data";
      echo $msg;
    }		
  
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login | sign in </title>
  <style>
    body {
      background-color: #f1f1f1;
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
    h1 {
      color: #333;
      text-align: center;
      margin-bottom: 20px;
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
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 3px;
      margin-top: 20px;
      transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
    p {
      color: #333;
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }
    a {
      color: #4CAF50;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    a:hover {
      color: #3e8e41;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <p>Please fill in your credentials to login.</p>
    <form method="POST" action="">
      <label>Username:</label>
      <input type="text" name="username">
      <label>Password:</label>
      <input type="password" name="password">
      <input type="submit" name="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="./signup form.php">Sign up now</a></p>
  </div>
</body>
</html>


