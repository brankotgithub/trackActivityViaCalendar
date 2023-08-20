<?php
session_start();

$mysqli = new mysqli("sql300.epizy.com","epiz_30944424", "bvYl5uccfJfJ1CI","mydb") 
        or die(mysqli_error($mysqli));

$idSubjekat=0;
$update=false;
$NazivSubjekta="";
$PrezimeVlasnika="";

//filter_input(INPUT_POST, 'save') instead of $_POST['var_firstname']
//filter_input_array(INPUT_POST) instead of $_POST
function homepage() {
  header('Status: 301 Moved Permanently', false, 301);      
  header("Location:subjekat.php");
  exit(); 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// unos podataka u bayu po kliku na sacuvaj Ali ne moye ynog editovanja podataka 
// EDIT ne readi ybog SERVER REQUEST_METHODe unese yapis kao novi - ne edituje ga
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $NazivSubjekta = htmlspecialchars($_REQUEST['NazivSubjekta']);
    $lastname = htmlspecialchars($_REQUEST['lastname']);
    if (empty($firstname)) {
        $_SESSION['masage']="Morata uneti svoje ime!";
            
       homepage();
    } else {
         $mysqli->query("INSERT INTO izradjivac (firstname, lastname)
            VALUES ('$firstname', '$lastname')") or
                    die($mysqli->error);  
            $_SESSION['masage']="Uspesno unet zapis pod rbr 1.!";
            $_SESSION[msg_type]="succes";
            
    homepage();
    }
}
//Moze i ovako samo nema proveme praznog polja FIRSTNAME koa u prethodnoj if petlji

 */
/* if (isset ($_POST['save'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $mysqli->query("INSERT INTO izradjivac (firstname, lastname)
            VALUES ('$firstname', '$lastname')") or
                    die($mysqli->error);  
            $_SESSION['masage']="Uspesno unet zapis!";
            $_SESSION[msg_type]="succes";
            
    homepage();
}
*/

if (isset ($_POST['save'])) {
    $NazivSubjekta = htmlspecialchars($_REQUEST['NazivSubjekta']);
    $PrezimeVlasnika= htmlspecialchars($_REQUEST['PrezimeVlasnika']);
   
    if (empty($NazivSubjekta) or (!preg_match("/^[a-zA-Z-' ]*$/",$NazivSubjekta))
            or (!preg_match("/^[a-zA-Z-' ]*$/",$PrezimeVlasnika))) {
          $_SESSION['masage']="Morata uneti ime! U oba polja unesite samo slova ili prazna polja!";
            homepage();
        
        } else {    
      $NazivSubjektaErr = htmlspecialchars($_REQUEST['NazivSubjekta']);
      $NazivSubjekta = test_input($NazivSubjektaErr);
      $PrezimeVlasnika= test_input($_POST["PrezimeVlasnika"]);
      $mysqli->query("INSERT INTO subjekat (NazivSubjekta, PrezimeVlasnika)
            VALUES ('$NazivSubjekta', '$PrezimeVlasnika')") or
                    die($mysqli->error);  
            $_SESSION['masage']="Uspesno unet zapis pod rbr 1.!";
            $_SESSION[msg_type]="succes";   
            homepage();
      }
    }

  
if (isset ($_GET['delete'])){
    $idSubjekat=$_GET['delete'];
    $mysqli->query("DELETE FROM subjekat WHERE idSubjekat=$idSubjekat") or die (mysqli_error($mysqli));
    
    $_SESSION['masage']="Uspesno obrisan zapis!";
    $_SESSION[msg_type]="danger";
    
    homepage();
    
}
if (isset ($_GET['edit'])){
    $idSubjekat=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM subjekat WHERE idSubjekat=$idSubjekat") or die (mysqli_error($mysqli));
if (is_iterable($result)){
        $row=$result->fetch_array();
        $NazivSubjekta=$row['NazivSubjekta'];
        $PrezimeVlasnika=$row['PrezimeVlasnika'];
}}

if (isset ($_POST['update'])){
    $idSubjekat=$_POST['idSubjekat'];
    $NazivSubjekta = $_POST['NazivSubjekta'];
    $PrezimeVlasnika = $_POST['PrezimeVlasnika'];
    $mysqli->query("UPDATE subjekat SET NazivSubjekta='$NazivSubjekta', PrezimeVlasnika='$PrezimeVlasnika' WHERE idSubjekat=$idSubjekat") or die (mysqli_error($mysqli));
    
    $_SESSION['masage']="Uspesno promenjen zapis!";
    $_SESSION[msg_type]="waning";
    
    homepage();
    
}
