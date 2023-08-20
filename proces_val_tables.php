<?php

session_start();

date_default_timezone_set("Europe/Belgrade");

define('DB_SERVER', 'sql300.epizy.com');
define('DB_USERNAME', 'epiz_30944424');
define('DB_PASSWORD', 'bvYl5uccfJfJ1CI');
define('DB_NAME', 'epiz_30944424_mydb');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$mysqli = new mysqli("sql300.epizy.com", "epiz_30944424", "bvYl5uccfJfJ1CI", "epiz_30944424_mydb") 
        or die(mysqli_error($mysqli));

// promenljiva za show/hide dugmeta sacuvaj promene i ostalih polja u formama
$update=false;
$updateIzv==false; //prikazuje izvrsioca na pocetku forme na stranici projekat na klik id u tabeli
$updateSub==false; //isto samo za naziv subjekta


/*deinisanje varijabli ya tabelu subjekat-moyda i ne trebaju
$idSubjekat=0;
$NazivSubjekta="";
$PrezimeVlasnika="";
$ImeVlasnika="";
$mail1="";
$PoslovniTelefon1 = "";
$MobilniTelefon1 = "";
$PrezimeKontaktLice = "";
$ImeKontaktLice = "";
$MobilniTelefon2 = "";
	
$usernameSesion=htmlspecialchars($_SESSION["username"]);

$id=0;
$firstname="";
$lastname="";
*/

$uname = $password = "";
$uname_err = $password_err = $login_err = "";


//filter_input(INPUT_POST, 'save') instead of $_POST['var_firstname']
//filter_input_array(INPUT_POST) instead of $_POST
function homepageSubjekat() {
  header('Status: 301 Moved Permanently', false, 301);      
  header("Location:index.php");
  exit(); 
}

function homepageIzradjivac() {
  header('Status: 301 Moved Permanently', false, 301);      
  header("Location:IzvrsiteljForm.php");
  exit(); 
}

function homepageProjekat() {
  header('Status: 301 Moved Permanently', false, 301);      
  header("Location:projekat.php");
  exit(); 
}

function homepageAkta() {
  header('Status: 301 Moved Permanently', false, 301);      
  header("Location:akta.php");
  exit(); 
}

function homepageDirektor(){
  header('Status: 301 Moved Permanently', false, 301);      
  header("Location:direktor.php");
  exit(); 
}

function homepageTabela_stampa(){
  header('Status: 301 Moved Permanently', false, 301);      
  header("Location:tabela_stampa.php");
  exit(); 
}

function homepagearhivirana_akta_stampa(){
  header('Status: 301 Moved Permanently', false, 301);      
  header("Location:arhivirana_akta_stampa.php");
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
//subjekat forma
if (isset ($_POST['saveSubjekat'])) {
    $NazivSubjekta = htmlspecialchars($_REQUEST['NazivSubjekta']);
    
   
    if (empty($NazivSubjekta) or (!preg_match("/^[a-zA-Z-' ]*$/",$NazivSubjekta))
            or (!preg_match("/^[a-zA-Z-' ]*$/",$PrezimeVlasnika))) {
          $_SESSION['masage']="Morata uneti ime! U oba polja unesite samo slova ili prazna polja!";
            homepageSubjekat();
        
        } else {    
      $NazivSubjektaErr = htmlspecialchars($_REQUEST['NazivSubjekta']);
      $NazivSubjekta = test_input($NazivSubjektaErr);
      
      $mysqli->query("INSERT INTO subjekat (NazivSubjekta)
            VALUES ('$NazivSubjekta')") or
                    die($mysqli->error);  
            $_SESSION['masage']="Uspesno unet zapis pod rbr 1.!";
            $_SESSION[msg_type]="succes";   
            homepageSubjekat();
      }
    }

  
if (isset ($_GET['deleteSubjekat'])){
    $idSubjekat=$_GET['deleteSubjekat'];
    $mysqli->query("DELETE FROM subjekat WHERE idSubjekat=$idSubjekat") or die (mysqli_error($mysqli));
    
    $_SESSION['masage']="Uspesno obrisan zapis!";
    $_SESSION[msg_type]="danger";
    
    homepageSubjekat();
    
}
if (isset ($_GET['editSubjekat'])){
    $idSubjekat=$_GET['editSubjekat'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM subjekat WHERE idSubjekat=$idSubjekat") or die (mysqli_error($mysqli));
if (is_iterable($result)){
        $row=$result->fetch_array();
        $idSubjekat=$row['idSubjekat'];
        $NazivSubjekta=$row['NazivSubjekta'];
        $PrezimeVlasnika=$row['PrezimeVlasnika'];
        $ImeVlasnika=$row['ImeVlasnika'];
        $mail1=$row['mail1'];
        $PoslovniTelefon1=$row['PoslovniTelefon1'];
        $MobilniTelefon1=$row['MobilniTelefon1'];
        $PrezimeKontaktLice=$row['PrezimeKontaktLice'];
        $ImeKontaktLice=$row['ImeKontaktLice'];
        $MobilniTelefon2=$row['MobilniTelefon2']; 
            }
         }

if (isset ($_POST['updateSubjekat'])){
    $idSubjekat=$_POST['idSubjekat'];
    $NazivSubjekta = $_POST['NazivSubjekta'];
    $PrezimeVlasnika = $_POST['PrezimeVlasnika'];
    $ImeVlasnika = $_POST['ImeVlasnika'];
    $mail1 = $_POST['mail1'];
    $PoslovniTelefon1 =$_POST['PoslovniTelefon1'];
    $MobilniTelefon1 = $_POST['MobilniTelefon1'];
    $PrezimeKontaktLice = $_POST['PrezimeKontaktLice'];
    $ImeKontaktLice = $_POST['ImeKontaktLice'];
    $MobilniTelefon2 = $_POST['MobilniTelefon2'];

    $mysqli->query("UPDATE subjekat SET NazivSubjekta='$NazivSubjekta', PrezimeVlasnika='$PrezimeVlasnika', ImeVlasnika='$ImeVlasnika', mail1='$mail1',
   PoslovniTelefon1='$PoslovniTelefon1', MobilniTelefon1='$MobilniTelefon1', PrezimeKontaktLice='$PrezimeKontaktLice', ImeKontaktLice='$ImeKontaktLice', MobilniTelefon2='$MobilniTelefon2'
    
    WHERE idSubjekat=$idSubjekat") or die (mysqli_error($mysqli));
    
    $_SESSION['masage']="Uspesno promenjen zapis!";
    $_SESSION[msg_type]="warning";
    
    homepageSubjekat();
    
}

if (isset ($_GET['aktivnostiSubj'])){
    $idSubjekat=$_GET['aktivnostiSubj'];

     include 'inlude/create_spia.php';  
     
    $_SESSION['masageSubj']=$idSubjekat;
    homepageSubjekat();
    }


//izvodjac forma
if (isset ($_POST['save'])) {
    $firstname = htmlspecialchars($_REQUEST['firstname']);
    $lastname = htmlspecialchars($_REQUEST['lastname']);
    $reg_date = date('Y-m-d H:i:s');
    
   
    if (empty($firstname) or (!preg_match("/^[a-zA-Z-' ]*$/",$firstname))
            or (!preg_match("/^[a-zA-Z-' ]*$/",$lastname))) {
          $_SESSION['masage']="Morata uneti ime! U oba polja unesite samo slova ili prazna polja!";
            homepageIzradjivac();
        
        } else {    
      $firstnameErr = htmlspecialchars($_REQUEST['firstname']);
      $firstname = test_input($firstnameErr);
      $lastname= test_input($_POST["lastname"]);
      $mysqli->query("INSERT INTO izradjivac (firstname, lastname, reg_date)
            VALUES ('$firstname', '$lastname', '$reg_date')") or
                    die($mysqli->error);  
            $_SESSION['masage']="Uspesno unet zapis pod rbr 1.!";
            $_SESSION[msg_type]="succes";   
            homepageIzradjivac();
      }
    }



  
if (isset ($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM izradjivac WHERE id=$id") or die (mysqli_error($mysqli));
    
    $_SESSION['masage']="Uspesno obrisan zapis!";
    $_SESSION[msg_type]="danger";
    
    homepageIzradjivac();
    
}
if (isset ($_GET['edit'])){
    $id1=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM izradjivac WHERE id=$id1") or die (mysqli_error($mysqli));
if (is_iterable($result)){
        $row=$result->fetch_array();
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $username=$row['username'];
        $email=$row['email'];
        $reg_date=$row['reg_date'];
        $Firma=$row['Firma'];
        $PozicijaUfirmi=$row['PozicijaUfirmi'];
        $PoslovniTelefon=$row['PoslovniTelefon'];
        $KucniTelefon=$row['KucniTelefon'];
        $MobilniTelefon=$row['MobilniTelefon'];
        $UlicaIBroj=$row['UlicaIBroj'];
        $Grad=$row['Grad'];
        $Drzava=$row['Drzava'];
        $PostanskiBroj=$row['PostanskiBroj'];
        $Web=$row['Web'];
        $Beleske=$row['Beleske'];

}}

/*if (isset ($_GET['prikazAktUizvr'])){
    $idAkta=$_GET['prikazAktUizvr'];
    $updateIzv=true;
    $result=$mysqli->query("SELECT * FROM akta WHERE idAkta=$idAkta") or die (mysqli_error($mysqli));
if (is_iterable($result)){
        $row=$result->fetch_array();
        $NazivAkta=$row['NazivAkta'];
}}

if (isset ($_GET['prikazProjUizvr'])){
    $idProjekat=$_GET['prikazProjUizvr'];
    $updateSub=true;
    $resultSub=$mysqli->query("SELECT * FROM projekat WHERE idProjekat=$idProjekat") or die (mysqli_error($mysqli));
if (is_iterable($resultSub)){
        $row=$resultSub->fetch_array();
        $NazivProjekta=$row['NazivProjekta'];
}}
*/


if (isset ($_POST['update'])){
    $id=$_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
     $email=$_POST['email'];
        $reg_date=$_POST['reg_date'];
        $Firma=$_POST['Firma'];
        $PozicijaUfirmi=$_POST['PozicijaUfirmi'];
        $PoslovniTelefon=$_POST['PoslovniTelefon'];
        $KucniTelefon=$_POST['KucniTelefon'];
        $MobilniTelefon=$_POST['MobilniTelefon'];
        $UlicaIBroj=$_POST['UlicaIBroj'];
        $Grad=$_POST['Grad'];
        $Drzava=$_POST['Drzava'];
        $PostanskiBroj=$_POST['PostanskiBroj'];
        $Web=$_POST['Web'];
        $Beleske=$_POST['Beleske'];
    $mysqli->query("UPDATE izradjivac SET firstname='$firstname', lastname='$lastname', email='$email',  reg_date='$reg_date', Firma='$Firma',
    PozicijaUfirmi='$PozicijaUfirmi', PoslovniTelefon='$PoslovniTelefon', KucniTelefon='$KucniTelefon',  MobilniTelefon='$MobilniTelefon', UlicaIBroj='$UlicaIBroj', 
    Grad='$Grad', Drzava='$Drzava', PostanskiBroj='$PostanskiBroj', Web='$Web', Beleske='$Beleske' WHERE id=$id") or die (mysqli_error($mysqli));
    
    $_SESSION['masage']="Uspesno promenjen zapis!";
    $_SESSION[msg_type]="waning";
    
    homepageIzradjivac();
    
}



if (isset ($_GET['aktivnostiIzvrs'])){
    $id=$_GET['aktivnostiIzvrs'];
    
        include 'inlude/create_spia.php';  
        

    $_SESSION['masage1']=$id;
    homepageIzradjivac();
    }


//direktor forma
/*if (isset ($_POST['save'])) {
    $firstname = htmlspecialchars($_REQUEST['firstname']);
    $lastname = htmlspecialchars($_REQUEST['lastname']);
    $reg_date = date('Y-m-d H:i:s');
    
   
    if (empty($firstname) or (!preg_match("/^[a-zA-Z-' ]*$/",$firstname))
            or (!preg_match("/^[a-zA-Z-' ]*$/",$lastname))) {
          $_SESSION['masage']="Morata uneti ime! U oba polja unesite samo slova ili prazna polja!";
            homepageDirektor();
        
        } else {    
      $firstnameErr = htmlspecialchars($_REQUEST['firstname']);
      $firstname = test_input($firstnameErr);
      $lastname= test_input($_POST["lastname"]);
      $mysqli->query("INSERT INTO admin (firstname, lastname, reg_date)
            VALUES ('$firstname', '$lastname', '$reg_date')") or
                    die($mysqli->error);  
            $_SESSION['masage']="Uspesno unet zapis pod rbr 1.!";
            $_SESSION[msg_type]="succes";   
            homepageDirektor();
      }
    }

*/

  
if (isset ($_GET['deleteAdmin'])){
    $id=$_GET['deleteAdmin'];
    $mysqli->query("DELETE FROM admin WHERE id=$id") or die (mysqli_error($mysqli));
    
    $_SESSION['masage']="Uspesno obrisan zapis!";
    $_SESSION[msg_type]="danger";
    
    homepageDirektor();
    
}
if (isset ($_GET['editAdmin'])){
    $id=$_GET['editAdmin'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM admin WHERE id=$id") or die (mysqli_error($mysqli));
if (is_iterable($result)){
        $row=$result->fetch_array();
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $username=$row['username'];
        $email=$row['email'];
        $reg_date=$row['reg_date'];
        $Firma=$row['Firma'];
        $PozicijaUfirmi=$row['PozicijaUfirmi'];
        $PoslovniTelefon=$row['PoslovniTelefon'];
        $KucniTelefon=$row['KucniTelefon'];
        $MobilniTelefon=$row['MobilniTelefon'];
        $UlicaIBroj=$row['UlicaIBroj'];
        $Grad=$row['Grad'];
        $Drzava=$row['Drzava'];
        $PostanskiBroj=$row['PostanskiBroj'];
        $Web=$row['Web'];
        $Beleske=$row['Beleske'];

}}


if (isset ($_POST['updateAdmin'])){
    $id=$_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
     $email=$_POST['email'];
        $reg_date=$_POST['reg_date'];
        $Firma=$_POST['Firma'];
        $PozicijaUfirmi=$_POST['PozicijaUfirmi'];
        $PoslovniTelefon=$_POST['PoslovniTelefon'];
        $KucniTelefon=$_POST['KucniTelefon'];
        $MobilniTelefon=$_POST['MobilniTelefon'];
        $UlicaIBroj=$_POST['UlicaIBroj'];
        $Grad=$_POST['Grad'];
        $Drzava=$_POST['Drzava'];
        $PostanskiBroj=$_POST['PostanskiBroj'];
        $Web=$_POST['Web'];
        $Beleske=$_POST['Beleske'];
    $mysqli->query("UPDATE admin SET firstname='$firstname', lastname='$lastname', email='$email',  reg_date='$reg_date', Firma='$Firma',
    PozicijaUfirmi='$PozicijaUfirmi', PoslovniTelefon='$PoslovniTelefon', KucniTelefon='$KucniTelefon',  MobilniTelefon='$MobilniTelefon', UlicaIBroj='$UlicaIBroj', 
    Grad='$Grad', Drzava='$Drzava', PostanskiBroj='$PostanskiBroj', Web='$Web', Beleske='$Beleske' WHERE id=$id") or die (mysqli_error($mysqli));
    
    $_SESSION['masage']="Uspesno promenjen zapis!";
    $_SESSION[msg_type]="waning";
    
    homepageDirektor();
    
}

//projekat forma
if (isset ($_POST['saveProjekat'])) {
    $NazivProjekta = htmlspecialchars($_REQUEST['NazivProjekta']);
    $StatusProjekta= htmlspecialchars($_REQUEST['StatusProjekta']);
   
    if (empty($NazivProjekta) or (!preg_match("/^[a-zA-Z-' ]*$/",$NazivProjekta))
            or (!preg_match("/^[a-zA-Z-' ]*$/",$StatusProjekta))) {
          $_SESSION['masage']="Morata uneti naziv projekta! Unesite samo slova ili prazna polja!";
            homepageProjekat();
        
        } else {    
      $NazivProjektaErr = htmlspecialchars($_REQUEST['NazivProjekta']);
      $NazivProjekta = test_input($NazivProjektaErr);
      $StatusProjekta= test_input($_POST["StatusProjekta"]);
      $mysqli->query("INSERT INTO projekat (NazivProjekta, StatusProjekta)
            VALUES ('$NazivProjekta', '$StatusProjekta')") or
                    die($mysqli->error);  
            $_SESSION['masage']="Uspesno unet zapis pod rbr 1.!";
            $_SESSION[msg_type]="succes";   
            homepageProjekat();
      }
    }

  
if (isset ($_GET['deleteProjekat'])){
    $idProjekat=$_GET['deleteProjekat'];
    $mysqli->query("DELETE FROM projekat WHERE idProjekat=$idProjekat") or die (mysqli_error($mysqli));
    
    $_SESSION['masage']="Uspesno obrisan zapis!";
    $_SESSION[msg_type]="danger";
    
    homepageProjekat();
    
}




if (isset ($_GET['editProjekat'])){
    $idProjekat1=$_GET['editProjekat'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM projekat WHERE idProjekat=$idProjekat1") or die (mysqli_error($mysqli));
if (is_iterable($result)){
        $row=$result->fetch_array();
        $NazivProjekta=$row['NazivProjekta'];
        $StatusProjekta=$row['StatusProjekta'];
        $DatumSklapanjaUgovora=$row['DatumSklapanjaUgovora'];
        $IzdatRacun=$row['IzdatRacun'];
        $IzvrsenoPlacanje=$row['IzvrsenoPlacanje'];
        $DatumUplate=$row['DatumUplate'];
        $KorektivnaMera=$row['KorektivnaMera'];
        $Problemi=$row['Problemi'];
        $KonacnaMera=$row['KonacnaMera'];
        $Azururanje=$row['Azururanje'];
}}

/*if (isset ($_GET['prikazIzvUproj'])){
    $id=$_GET['prikazIzvUproj'];
    $updateIzv=true;
    $result=$mysqli->query("SELECT * FROM izradjivac WHERE id=$id") or die (mysqli_error($mysqli));
if (is_iterable($result)){
        $row=$result->fetch_array();
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
}}

if (isset ($_GET['prikazSubUproj'])){
    $idSubjekat=$_GET['prikazSubUproj'];
    $updateSub=true;
    $resultSub=$mysqli->query("SELECT * FROM subjekat WHERE idSubjekat=$idSubjekat") or die (mysqli_error($mysqli));
if (is_iterable($resultSub)){
        $row=$resultSub->fetch_array();
        $idSubjekat=$row['idSubjekat'];
        $NazivSubjekta=$row['NazivSubjekta'];
}}
*/

if (isset ($_POST['updateProjekat'])){
    $idProjekat=$_POST['idProjekat'];
    $NazivProjekta = $_POST['NazivProjekta'];
    $StatusProjekta = $_POST['StatusProjekta'];
        $DatumSklapanjaUgovora=$_POST['DatumSklapanjaUgovora'];
        $IzdatRacun=$_POST['IzdatRacun'];
        $IzvrsenoPlacanje=$_POST['IzvrsenoPlacanje'];
        $DatumUplate=$_POST['DatumUplate'];
        $KorektivnaMera=$_POST['KorektivnaMera'];
        $Problemi=$_POST['Problemi'];
        $KonacnaMera=$_POST['KonacnaMera'];
        $Azururanje=$_POST['Azururanje'];
    $mysqli->query("UPDATE projekat SET NazivProjekta='$NazivProjekta', StatusProjekta='$StatusProjekta', 
    DatumSklapanjaUgovora='$DatumSklapanjaUgovora', IzdatRacun='$IzdatRacun', IzvrsenoPlacanje='$IzvrsenoPlacanje', DatumUplate='$DatumUplate',
    KorektivnaMera='$KorektivnaMera', Problemi='$Problemi', KonacnaMera='$KonacnaMera', Azururanje='$Azururanje'
    WHERE idProjekat=$idProjekat") or die (mysqli_error($mysqli));
    
    $_SESSION['masage']="Uspesno promenjen zapis!";
    $_SESSION[msg_type]="waning";
    
    homepageProjekat();
    
}

if (isset ($_GET['aktivnostiProj'])){
    $idProjekat=$_GET['aktivnostiProj'];

     include 'inlude/create_spia.php';  
      


    $_SESSION['masageProj']=$idProjekat;
    homepageProjekat();
    }


//akta forma
if (isset ($_POST['saveAkta'])) {
    $SubjekatID = $_POST['SubjekatID'];
    $ProjekatID= $_POST['ProjekatID'];
    $IzradjivacID= $_POST['IzradjivacID'];
    $NazivAkta= htmlspecialchars($_REQUEST['NazivAkta']);
    $DatumKreiranjaAkta = date('Y-m-d H:i:s');
   
    if (empty($NazivAkta) or (!preg_match("/^[a-zA-Z-' ]*$/",$NazivAkta))
            ) {
          $_SESSION['masage']="Morata uneti naziv akta! Unesite samo slova ili prazna polja!";
            homepageAkta();
        
        } else {    
      $NazivAktaErr = htmlspecialchars($_REQUEST['NazivAkta']);
      $NazivAkta = test_input($NazivAktaErr);
      $mysqli->query("INSERT INTO akta (NazivAkta, SubjekatID, ProjekatID, IzradjivacID, DatumKreiranjaAkta)
            VALUES ('$NazivAkta','$SubjekatID', '$ProjekatID', '$IzradjivacID', '$DatumKreiranjaAkta')") or
                    die($mysqli->error);  
      $mysqli->query("INSERT INTO aktaCopy (NazivAkta, SubjekatID, ProjekatID, IzradjivacID, DatumKreiranjaAkta, vrstaPromene)
            VALUES ('$NazivAkta','$SubjekatID', '$ProjekatID', '$IzradjivacID', '$DatumKreiranjaAkta', '1')") or
                    die($mysqli->error);               
            $_SESSION['masage']="Uspesno unet zapis pod rbr 1.!";
            $_SESSION[msg_type]="succes";   
            homepageAkta();
      }
    }


if (isset ($_GET['deleteAkta'])){
    $idAkta=$_GET['deleteAkta'];
    
    $resultAkta= $mysqli->query("SELECT * FROM akta WHERE idAkta=$idAkta")
                or die($mysqli->error);
    if (is_iterable($resultAkta)){
        $row=$resultAkta->fetch_array();
        $NazivAkta=$row['NazivAkta'];
        $DatumKreiranjaAkta=$row['DatumKreiranjaAkta'];
        $AzuriranjeAkta=$row['AzuriranjeAkta'];
        $Ispravan=$row['Ispravan'];
        $DatumSlanjaAktaSub=$row['DatumSlanjaAktaSub'];
        $DobijenaSaglasnostAkt=$row['DobijenaSaglasnostAkt'];
        $DatumDobijanjaSaglasnostiAkta=$row['DatumDobijanjaSaglasnostiAkta	'];
        $DatumDostavElemIzrPlana=$row['DatumDostavElemIzrPlana'];
        $IzradjivacID=$row['IzradjivacID'];
        $ProjekatID=$row['ProjekatID'];
        $SubjekatID=$row['SubjekatID'];

        $BrojUgovora=$row['BrojUgovora'];
        $StatusPoUgovoru=$row['StatusPoUgovoru'];
        $StatusProcesaIzrade1=$row['StatusProcesaIzrade1'];
        $StatusProcesaIzrade2=$row['StatusProcesaIzrade2'];
        $Tekst=$row['Tekst'];


    }

            $date=date_create("$AzuriranjeAkta");
            $AzuriranjeAkta1= date_format($date,"Y/m/d");
            $date=date_create("$DatumSlanjaAktaSub");
            $DatumSlanjaAktaSub1= date_format($date,"Y/m/d");
            $date=date_create("$DatumDobijanjaSaglasnostiAkta");
            $DatumDobijanjaSaglasnostiAkta1= date_format($date,"Y/m/d");
            $date=date_create("$DatumDostavElemIzrPlana");
            $DatumDostavElemIzrPlana1= date_format($date,"Y/m/d");


            $date=date_create("$DatumUgovora");
            $DatumUgovora1= date_format($date,"Y/m/d");
            $date=date_create("$DatumSlanjaAktaSub");
            $DatumSlanjaAktaSub1= date_format($date,"Y/m/d");
            $date=date_create("$ZavrsetakIzrade");
            $ZavrsetakIzrade1= date_format($date,"Y/m/d");
            $date=date_create("$DatumPoslatNadlOrganu");
            $DatumPoslatNadlOrganu1= date_format($date,"Y/m/d");
             $date=date_create("$KonacanZavrsetak");
            $KonacanZavrsetak1= date_format($date,"Y/m/d");

   

    $mysqli->query("INSERT INTO aktaCopy (NazivAkta, DatumKreiranjaAkta, AzuriranjeAkta, Ispravan, DatumSlanjaAktaSub,
    DobijenaSaglasnostAkt, DatumDobijanjaSaglasnostiAkta, DatumDostavElemIzrPlana, IzradjivacID, ProjekatID, SubjekatID, vrstaPromene,
    BrojUgovora, DatumUgovora, StatusPoUgovoru, StatusProcesaIzrade1,
    StatusProcesaIzrade2, ZavrsetakIzrade, DatumPoslatNadlOrganu, Tekst, KonacanZavrsetak)
            VALUES ('$NazivAkta', '$DatumKreiranjaAkta', '$AzuriranjeAkta1', '$Ispravan', '$DatumSlanjaAktaSub1',
    '$DobijenaSaglasnostAkt', '$DatumDobijanjaSaglasnostiAkta1', '$DatumDostavElemIzrPlana1', '$IzradjivacID', '$ProjekatID', '$SubjekatID', '3',
    '$BrojUgovora', '$DatumUgovora1', '$StatusPoUgovoru', '$StatusProcesaIzrade1',
    '$StatusProcesaIzrade2', '$ZavrsetakIzrade1', '$DatumPoslatNadlOrganu1', '$Tekst', '$KonacanZavrsetak1')") or
                    die($mysqli->error);
    
    $mysqli->query("DELETE FROM akta WHERE idAkta=$idAkta") or die (mysqli_error($mysqli));
    
    $_SESSION['masage']="Uspesno arhiviran zapis!";
    $_SESSION[msg_type]="danger";
    
    homepageAkta();
    
}




if (isset ($_GET['editAkta'])){
    $idAkta=$_GET['editAkta'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM akta WHERE idAkta=$idAkta") or die (mysqli_error($mysqli));
if (is_iterable($result)){
        $row=$result->fetch_array();
        $NazivAkta=$row['NazivAkta'];
        $DatumKreiranjaAkta=$row['DatumKreiranjaAkta'];
        $AzuriranjeAkta=$row['AzuriranjeAkta'];
        $Ispravan=$row['Ispravan'];
        $DatumSlanjaAktaSub=$row['DatumSlanjaAktaSub'];
        $DobijenaSaglasnostAkt=$row['DobijenaSaglasnostAkt'];
        $DatumDobijanjaSaglasnostiAkta=$row['DatumDobijanjaSaglasnostiAkta'];
        $DatumDostavElemIzrPlana=$row['DatumDostavElemIzrPlana'];

        $BrojUgovora=$row['BrojUgovora'];
        $DatumUgovora=$row['DatumUgovora'];
        $StatusPoUgovoru=$row['StatusPoUgovoru'];
        $StatusProcesaIzrade1=$row['StatusProcesaIzrade1'];
        $StatusProcesaIzrade2=$row['StatusProcesaIzrade2'];
        $ZavrsetakIzrade=$row['ZavrsetakIzrade'];
        $DatumPoslatNadlOrganu=$row['DatumPoslatNadlOrganu'];
        $Tekst=$row['Tekst'];
        $KonacanZavrsetak=$row['KonacanZavrsetak'];

        $IzradjivacID=$row['IzradjivacID'];
        $ProjekatID=$row['ProjekatID'];
        $SubjekatID=$row['SubjekatID'];
}}

if (isset ($_POST['updateAkta'])){
    $idAkta=$_POST['idAkta'];
    $NazivAkta = $_POST['NazivAkta'];
        $DatumKreiranjaAkta = $_POST['DatumKreiranjaAkta'];
        $AzuriranjeAkta=$_POST['AzuriranjeAkta'];
        $Ispravan=$_POST['Ispravan'];
        $DatumSlanjaAktaSub=$_POST['DatumSlanjaAktaSub'];
        $DobijenaSaglasnostAkt=$_POST['DobijenaSaglasnostAkt'];
        $DatumDobijanjaSaglasnostiAkta=$_POST['DatumDobijanjaSaglasnostiAkta'];
        $DatumDostavElemIzrPlana=$_POST['DatumDostavElemIzrPlana'];
        $IzradjivacID=$_POST['IzradjivacID'];
        $ProjekatID=$_POST['ProjekatID'];
        $SubjekatID=$_POST['SubjekatID'];
        $usernameSesion=htmlspecialchars($_SESSION["username"]);

        $BrojUgovora=$_POST['BrojUgovora'];
        $DatumUgovora=$_POST['DatumUgovora'];
        $StatusPoUgovoru=$_POST['StatusPoUgovoru'];
        $StatusProcesaIzrade1=$_POST['StatusProcesaIzrade1'];
        $StatusProcesaIzrade2=$_POST['StatusProcesaIzrade2'];
        $ZavrsetakIzrade=$_POST['ZavrsetakIzrade'];
        $DatumPoslatNadlOrganu=$_POST['DatumPoslatNadlOrganu'];
        $Tekst=$_POST['Tekst'];
        $KonacanZavrsetak=$_POST['KonacanZavrsetak'];
        

    $mysqli->query("UPDATE akta SET NazivAkta='$NazivAkta', DatumKreiranjaAkta='$DatumKreiranjaAkta', 
    AzuriranjeAkta='$AzuriranjeAkta', Ispravan='$Ispravan', DatumSlanjaAktaSub='$DatumSlanjaAktaSub', DobijenaSaglasnostAkt='$DobijenaSaglasnostAkt',
    DatumDobijanjaSaglasnostiAkta='$DatumDobijanjaSaglasnostiAkta', DatumDostavElemIzrPlana='$DatumDostavElemIzrPlana', 
    
    BrojUgovora='$BrojUgovora', DatumUgovora='$DatumUgovora', StatusPoUgovoru='$StatusPoUgovoru', StatusProcesaIzrade1='$StatusProcesaIzrade1',
    StatusProcesaIzrade2='$StatusProcesaIzrade2', ZavrsetakIzrade='$ZavrsetakIzrade', DatumPoslatNadlOrganu='$DatumPoslatNadlOrganu',
    Tekst='$Tekst', KonacanZavrsetak='$KonacanZavrsetak', 
    IzradjivacID='$IzradjivacID', ProjekatID='$ProjekatID', SubjekatID='$SubjekatID'
    WHERE idAkta=$idAkta") or die (mysqli_error($mysqli));
    
     $mysqli->query("INSERT INTO aktaCopy (NazivAkta, SubjekatID, ProjekatID, IzradjivacID, DatumKreiranjaAkta, AzuriranjeAkta, Ispravan, 
     DatumSlanjaAktaSub, DobijenaSaglasnostAkt, DatumDobijanjaSaglasnostiAkta, DatumDostavElemIzrPlana, vrstaPromene, usernameSesion,
     BrojUgovora, DatumUgovora, StatusPoUgovoru, StatusProcesaIzrade1,
    StatusProcesaIzrade2, ZavrsetakIzrade, DatumPoslatNadlOrganu, Tekst, KonacanZavrsetak
     
     )
            VALUES ('$NazivAkta','$SubjekatID', '$ProjekatID', '$IzradjivacID', '$DatumKreiranjaAkta', 
            '$AzuriranjeAkta', '$Ispravan', '$DatumSlanjaAktaSub', '$DobijenaSaglasnostAkt', '$DatumDobijanjaSaglasnostiAkta', 
            '$DatumDostavElemIzrPlana', '2', '$usernameSesion',
            
            
            '$BrojUgovora', '$DatumUgovora', '$StatusPoUgovoru', '$StatusProcesaIzrade1',
    '$StatusProcesaIzrade2', '$ZavrsetakIzrade', '$DatumPoslatNadlOrganu', '$Tekst', '$KonacanZavrsetak'
            
            
            )") or
                    die($mysqli->error);
    $_SESSION['masage']="Uspesno promenjen zapis!";
    $_SESSION[msg_type]="warning";
    
    homepageAkta();
    
}




if (isset ($_GET['obrisitabelu'])){
     $idAkta=$_GET['obrisitabelu'];

   include 'inlude/create_spia.php';  

  homepageTabela_stampa();
}

/* NIJE U UPOTREBI - POSTAVLJEN INCLUDE NA STRANICI create_arhiva_akta
if (isset ($_GET['arhivaAkta'])){
   
 
   include 'inlude/create_arhiva_akta.php';       


header("Location:arhivirana_akta.php");
}
*/

// menja vidljivost tekst reda u tabeli pregled aktivnih akata
if (isset ($_GET['tekstred'])){
    $tekst=$_GET['tekstred'];
    
    $_SESSION['masagetekstred']=!$tekst;
    homepageTabela_stampa();
    }


?>


