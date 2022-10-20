<?php
$conn = mysqli_connect('localhost', 'root', '', 'slutprojekt test');
if(isset($_POST['submit']))
{
    // Skapar anslutning
  
    $uname = $_POST['username'];
    $emejl = $_POST['email'];
    $losenord = $_POST['psw'];
    $sql = "INSERT INTO userdb(username, email, password) VALUES ('$uname', '$emejl', '$losenord')";
    
    if(mysqli_query($conn, $sql)){
        echo "<h3>data stored in a database successfully." 
            . " Please browse your localhost php my admin" 
            . " to view the updated data</h3>";
            header("Location: inloggad.php");
    
     
    } else{
        echo "ERROR: Hush! Sorry $sql. " 
            . mysqli_error($conn);
    }
    
    // Avslutar anslutning
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slutprojekt</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
<body>

<div class="header">
<h1>Welcome to BestWeatherPageNoCap, broadcasting the weather of european capitals</h1>
<h3>Please register below!</h3>
</div>


<form action="#" method="POST">
<fieldset>
                <div class="class1">

                   
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" id="username" required>

                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="email" id="email" required>
                
                    <br>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
                
                    <label for="psw-repeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Enter password again" name="psw-repeat" id="psw-repeat" required>


                    <p>Are you already a member? <a href="inloggad.php">Log in here</a>.</p>
                    <p>By registering you agree to our <a href="#">Terms & Privacy</a>.</p>
                    <label for="checkbox">I agree</label> <input type="checkbox" id="checkbox" name="checkbox"indeterminate>
                    <button type="submit" onClick="myFunction()" class="registerbtn" name="submit">Register</button>
                    
                    

                    </div>
            </fieldset>

</form>

</body>
</html>