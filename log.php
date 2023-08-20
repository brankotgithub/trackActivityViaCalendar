
<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: #");
    exit;
}

<!DOCTYPE html>
<html>
<head>
<title>KIS</title>
<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #386094;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 30%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.center {
                margin: auto;
                width: 60%;
                border: 3px solid black;
                padding: 10px;
                }
</style>
</head>
<body class="center">

<?php
date_default_timezone_set("Europe/Belgrade");

?>
        
  <?php require_once 'proces_val_tables.php';?>

<h2 class="center" style="text-align:center;">Login u KIS GLOSEC-a</h2>

<form action="proces_val_tables.php" method="post">
  <div class="imgcontainer">
    <img src="images/favicon.ico" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Korisnicko ime</b></label>
    <input type="text" placeholder="Unesi ime" name="uname" required>

    <label for="psw"><b>Sifra</b></label>
    <input type="password" placeholder="Unesi sifru" name="psw" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember">Zapamti me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Zaboravljena <a href="#">sifra?</a></span>
  </div>
</form>

</body>
</html>
