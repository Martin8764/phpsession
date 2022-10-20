<?php 
// Öppnar en anslutning till MySQL-servern
$conn = mysqli_connect('localhost', 'root', '', 'slutprojekt test');

// Startar en session med session_start() funktionen.
session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['psw']); 

      $sql = "SELECT * FROM userdb WHERE username = '$username'";

      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

      if($count == 1) {

        $_SESSION['username']= "username";
        $_SESSION['login_user'] = $username;

        header("location: welcomepage.php");
     }else {
        $error = "Your Login Name or Password is invalid";
     }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggad</title>
    <link rel="stylesheet" href="styleInloggad.css">
</head>
<body>

<form action="#" method="POST">

    <div class="container">           
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username" required>
                
    <br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>          
    <button type="submit" onClick="myFunction()" class="registerbtn" name="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
  </div>
</form>

</body>
</html>