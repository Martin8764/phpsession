<?php
// Öppnar en anslutning till MySQL-servern
$conn = mysqli_connect('localhost', 'root', '', 'slutprojekt test');

// Startar en session med session_start() funktionen.
session_start();
error_reporting(E_ERROR | E_PARSE);
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($conn,"select username from userdb where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['username'];

   // Skickar användaren till inloggad.php efter de har registrerat 
   if(!isset($_SESSION['login_user'])){
      header("location:inloggad.php");
      die();
   }

   // dark mode
   if($_COOKIE["theme"] == "dark") {
      $background = "#1b1d1e";
      $color = "#fff";
   } else {
      $background = "#f1f1f1";
      $color = "#1b1d1e";
   }

   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Inloggad - Test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <a class="navbar-brand">BestWeatherPageNoCap</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="welcomepage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tos.php">Terms of service</a>
      </li>
    </ul>
  </div>
</nav>

<div style="border:1px solid grey;">
<div class="d-flex justify-content-around">
<h2>Stockholm</h2>
<img id="iconImg" src="" alt="icon">
<h2>Temp:<span id="temp"></span>°C</h2>
<h2>Min Temp:<span id="mintemp"></span>°C</h2>
<h2>Max Temp:<span id="maxtemp"></span>°C</h2>
<h2>Humidity:<span id="humidity"></span>%</h2>
</div>
</div>

<div style="border:1px solid grey;">
<div class="d-flex justify-content-around">
<h2>London</h2>
<img id="iconImg2" src="" alt="icon">
<h2>Temp:<span id="temp2"></span>°C</h2>
<h2>Min Temp:<span id="mintemp2"></span>°C</h2>
<h2>Max Temp:<span id="maxtemp2"></span>°C</h2>
<h2>Humidity:<span id="humidity2"></span>%</h2>
</div>
</div>

<div style="border:1px solid grey;">
<div class="d-flex justify-content-around">
<h2>Paris</h2>
<img id="iconImg3" src="" alt="icon">
<h2>Temp:<span id="temp3"></span>°C</h2>
<h2>Min Temp:<span id="mintemp3"></span>°C</h2>
<h2>Max Temp:<span id="maxtemp3"></span>°C</h2>
<h2>Humidity:<span id="humidity3"></span>%</h2>
</div>
</div>

<div style="border:1px solid grey;">
<div class="d-flex justify-content-around">
<h2>Kiev</h2>
<img id="iconImg4" src="" alt="icon">
<h2>Temp:<span id="temp4"></span>°C</h2>
<h2>Min Temp:<span id="mintemp4"></span>°C</h2>
<h2>Max Temp:<span id="maxtemp4"></span>°C</h2>
<h2>Humidity:<span id="humidity4"></span>%</h2>
</div>
</div>

<div style="border:1px solid grey;">
<div class="d-flex justify-content-around">
<h2>Moskwa</h2>
<img id="iconImg5" src="" alt="icon">
<h2>Temp:<span id="temp5"></span>°C</h2>
<h2>Min Temp:<span id="mintemp5"></span>°C</h2>
<h2>Max Temp:<span id="maxtemp5"></span>°C</h2>
<h2>Humidity:<span id="humidity5"></span>%</h2>
</div>
</div>

<div style="border:1px solid grey;">
<div class="d-flex justify-content-around">
<h2>Berlin</h2>
<img id="iconImg6" src="" alt="icon">
<h2>Temp:<span id="temp6"></span>°C</h2>
<h2>Min Temp:<span id="mintemp6"></span>°C</h2>
<h2>Max Temp:<span id="maxtemp6"></span>°C</h2>
<h2>Humidity:<span id="humidity6"></span>%</h2>
</div>
</div>

<div style="border:1px solid grey;">
<div class="d-flex justify-content-around">
<h2>Madrid</h2>
<img id="iconImg7" src="" alt="icon">
<h2>Temp:<span id="temp7"></span>°C</h2>
<h2>Min Temp:<span id="mintemp7"></span>°C</h2>
<h2>Max Temp:<span id="maxtemp7"></span>°C</h2>
<h2>Humidity:<span id="humidity7"></span>%</h2>
</div>
</div>

<br>

<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
		<div class="text-center">
            <label for="switch">Darkmode?</label> <input type="checkbox" id="toggleTheme" <?php if($_COOKIE["theme"] == "dark") { echo "checked"; }?>>
					<span class="slider round"></span>

			</p>
		</div>

<div class="text-center" >
<h3>If you would like to logout, click the logout buttom below.</h3>
</div>
<form class="text-center" action="utloggad.php">   
      <button class="btn btn-outline-success" type="submit">Logout</button>
</form>

<br>


<script>
$.get('https://api.openweathermap.org/data/2.5/weather?q=Stockholm&appid=eacd9fd614793dd1bbdee11553553eb5&units=metric', function(data){
    let temp = Math.floor(data.main.temp);
    let mintemp = Math.floor(data.main.temp_min);
    let maxtemp = Math.floor(data.main.temp_max);
    let humidity = Math.floor(data.main.humidity);
    let iconimg = " http://openweathermap.org/img/wn/"+data.weather[0].icon+".png";
    $("#temp").html(temp);
    $("#mintemp").html(mintemp);
    $("#maxtemp").html(maxtemp);
    $("#humidity").html(humidity);
    $("#iconImg").attr("src", iconimg);

});
$.get('https://api.openweathermap.org/data/2.5/weather?q=London&appid=eacd9fd614793dd1bbdee11553553eb5&units=metric', function(data){
    let temp2 = Math.floor(data.main.temp);
    let mintemp2 = Math.floor(data.main.temp_min);
    let maxtemp2 = Math.floor(data.main.temp_max);
    let humidity2 = Math.floor(data.main.humidity);
    let iconimg2 = " http://openweathermap.org/img/wn/"+data.weather[0].icon+".png";
    $("#temp2").html(temp2);
    $("#mintemp2").html(mintemp2);
    $("#maxtemp2").html(maxtemp2);
    $("#humidity2").html(humidity2);
    $("#iconImg2").attr("src", iconimg2);

});

$.get('https://api.openweathermap.org/data/2.5/weather?q=Paris&appid=eacd9fd614793dd1bbdee11553553eb5&units=metric', function(data){
    let temp3 = Math.floor(data.main.temp);
    let mintemp3 = Math.floor(data.main.temp_min);
    let maxtemp3 = Math.floor(data.main.temp_max);
    let humidity3 = Math.floor(data.main.humidity);
    let iconimg3 = " http://openweathermap.org/img/wn/"+data.weather[0].icon+".png";
    $("#temp3").html(temp3);
    $("#mintemp3").html(mintemp3);
    $("#maxtemp3").html(maxtemp3);
    $("#humidity3").html(humidity3);
    $("#iconImg3").attr("src", iconimg3);

});

$.get('https://api.openweathermap.org/data/2.5/weather?q=Kiev&appid=eacd9fd614793dd1bbdee11553553eb5&units=metric', function(data){
    let temp4 = Math.floor(data.main.temp);
    let mintemp4 = Math.floor(data.main.temp_min);
    let maxtemp4 = Math.floor(data.main.temp_max);
    let humidity4 = Math.floor(data.main.humidity);
    let iconimg4 = " http://openweathermap.org/img/wn/"+data.weather[0].icon+".png";
    $("#temp4").html(temp4);
    $("#mintemp4").html(mintemp4);
    $("#maxtemp4").html(maxtemp4);
    $("#humidity4").html(humidity4);
    $("#iconImg4").attr("src", iconimg4);

});

$.get('https://api.openweathermap.org/data/2.5/weather?q=Moskwa&appid=eacd9fd614793dd1bbdee11553553eb5&units=metric', function(data){
    let temp5 = Math.floor(data.main.temp);
    let mintemp5 = Math.floor(data.main.temp_min);
    let maxtemp5 = Math.floor(data.main.temp_max);
    let humidity5 = Math.floor(data.main.humidity);
    let iconimg5 = " http://openweathermap.org/img/wn/"+data.weather[0].icon+".png";
    $("#temp5").html(temp5);
    $("#mintemp5").html(mintemp5);
    $("#maxtemp5").html(maxtemp5);
    $("#humidity5").html(humidity5);
    $("#iconImg5").attr("src", iconimg5);

});

$.get('https://api.openweathermap.org/data/2.5/weather?q=Berlin&appid=eacd9fd614793dd1bbdee11553553eb5&units=metric', function(data){
    let temp6 = Math.floor(data.main.temp);
    let mintemp6 = Math.floor(data.main.temp_min);
    let maxtemp6 = Math.floor(data.main.temp_max);
    let humidity6 = Math.floor(data.main.humidity);
    let iconimg6 = " http://openweathermap.org/img/wn/"+data.weather[0].icon+".png";
    $("#temp6").html(temp6);
    $("#mintemp6").html(mintemp6);
    $("#maxtemp6").html(maxtemp6);
    $("#humidity6").html(humidity6);
    $("#iconImg6").attr("src", iconimg6);

});

$.get('https://api.openweathermap.org/data/2.5/weather?q=Madrid&appid=eacd9fd614793dd1bbdee11553553eb5&units=metric', function(data){
    let temp7 = Math.floor(data.main.temp);
    let mintemp7 = Math.floor(data.main.temp_min);
    let maxtemp7 = Math.floor(data.main.temp_max);
    let humidity7 = Math.floor(data.main.humidity);
    let iconimg7 = " http://openweathermap.org/img/wn/"+data.weather[0].icon+".png";
    $("#temp7").html(temp7);
    $("#mintemp7").html(mintemp7);
    $("#maxtemp7").html(maxtemp7);
    $("#humidity7").html(humidity7);
    $("#iconImg7").attr("src", iconimg7);

});



$("#toggleTheme").on('change', function() {
				if($(this).is(':checked')) {
					$(this).attr('value', 'true');
					document.cookie = "theme=dark";
					location.reload();
				} else {
					$(this).attr('value', 'false');
					document.cookie = 'theme=; Max-Age=0';
					location.reload();
				}
			});
</script>

</body>
</html>
