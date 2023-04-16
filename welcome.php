<?php
 session_start();
 if(isset($_SESSION['USER_ID']) && isset($_SESSION['USER_NAME']))


  // If the username and password are correct, set the session variables
  $_SESSION['username'] = $username;

  // Redirect to the dashboard page with a welcome message
  // header("Location: dashboard.php?message=Welcome%20{$username},%20to%20our%20website!");
  // exit();}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Title> ITI </Title>
</head>
<body>
  <center><h1> <?php echo 'Welcome, <b>'.$_SESSION['USER_NAME'].'</b> to Our Site'?> </h1> </center> 
    <img src="./indexPage.jpg" alt="indexPage">
    <div class="footer">
        <p>copy right 2023 by reham ismail &copy;. all rights reserved </p>
    </div> 

</a> 
</body>
</html>
