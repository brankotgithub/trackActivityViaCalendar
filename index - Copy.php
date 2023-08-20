<?php 
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>

<html>
    <head>
    
     <?php include 'inlude/style.php';?>

    </head>
    

    <body class="center">
    <?php include 'inlude/header.php';?>
      <div class="navbar">
  <a href="https://branko.lovestoblog.com" class="active-link">Subjekti</a>
  <a href="https://branko.lovestoblog.com/projekat.php">Projekti</a>
  <a href="https://branko.lovestoblog.com/IzvrsiteljForm.php">Izvodjac</a>
  <a href="https://branko.lovestoblog.com/akta.php">Akta</a>
  <div class="dropdown">
    <button class="dropbtn">Preged/stampa 
      <i class="fa fa-caret-down"></i>
    </button>
    
    <div class="dropdown-content">
         <div class="header">
        
      </div>
      <div class="row">
        <div class="column">
          <h3>Projekti</h3>
          <a href="#">Aktivni</a>
          <a href="#">Naplaceni</a>
          <a href="#">Nenaplaceni</a>
        </div>
        <div class="column">
          <h3>Akta</h3>
          <a href="#">Aktivni</a>
          <a href="#">Dobijena saglasnost</a>
          <a href="#">Predati subjektu</a>
        </div>
        <div class="column">
          <h3>Arhiva</h3>
          <a href="#">Zavrsena akta</a>
          <a href="#">Zavrseni projeti</a>
          <a href="tabela_stampa.php">tabela_stampa</a>
        </div>
      </div>
    </div>
  </div> 
</div>

<?php
date_default_timezone_set("Europe/Belgrade");

?>
        
  <?php require_once 'proces_val_tables.php';?>
        <?php
        $mysqli = new mysqli("sql300.epizy.com", "epiz_30944424", "bvYl5uccfJfJ1CI", "epiz_30944424_mydb") 
        or die(mysqli_error($mysqli));
          
        
        $result= $mysqli->query("SELECT * FROM subjekat ORDER BY `subjekat`.`idSubjekat` DESC")
                or die($mysqli->error);
        ?>   

  
  <div>
            <table>
                <thead>
            <th class="thwidth"><input type="text" id="myInput" onkeyup="myFunction()" 
                class="pretrazi" title="Unesite ime" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th class="thwidth"><input type="text" id="myInput1" onkeyup="myFunction2()" 
                class="pretrazi" title="Unesite ime" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th><i class="fa fa-columns" style="font-size:24px;color:white"></i>Subjekti</th> 
               </thead>
            </table>

               <table>
                <thead>
                <tr >     
                    <th class="thwidth">Naziv subjekta</th> 
                    <th class="thwidth">Prezime vlasnika</th> 
                    <th >Izmeni-Obrisi-<i class="fa fa-envelope" style="color:white"></th>   
                </tr>
                </thead>
            </table>
            
            <div class="plutanje">
                           
        <table   id="myTable"> 
               <?php 
               $x=0; 
               while($row = $result->fetch_assoc()){ 
                   $x=$x+1?>
                
                <tr>
                    <td class="thwidth1"><?php echo $x.". ".$row["NazivSubjekta"];?></td>
                    <td class="thwidth1"><?php echo $row["PrezimeVlasnika"];?></td>
                    <td>
                        <a href="index - Copy.php?editSubjekat=<?php echo $row['idSubjekat'];?>"
                           >Izmeni  -</a>
                        <a href="proces_val_tables.php?deleteSubjekat=<?php echo $row['idSubjekat'];?>"
                           >Obrisi  -</a>
                        <a href="#"
                           ><i class="fa fa-envelope" style="color:blue"></i></a>
                    </td>
                </tr>
              <?php }   
                ?>
            
            </table>        
           
        </div>
        </div>
  
        <div class="formdiv">

        <div id="demo">  
        <?php
        if (isset($_SESSION['masage'])):?>
        <div class="divsesion">
            <?php
                echo $_SESSION['masage'];
                unset($_SESSION['masage']);
            ?>
            </div>
        <?php endif;?>
             
           </div>     
             
        <form action="proces_val_tables.php"  method="post">
            <input type="hidden" name="idSubjekat" value="<?php echo $idSubjekat?>" 
            <label>Unesite podatke o subjektu:</label>
             <input type="text" name="NazivSubjekta" autofocus value="<?php echo $NazivSubjekta?>" 
                    placeholder="Unesi naziv subjekta" title="Obavezno polje!" 
                    onclick="document.getElementById('demo').style.display = 'none'"><br>
           
           

            <?php
            if ($update==true) {?> 
            <div class="row">
                <div class="col-15">
                    <label for="PrezimeVlasnika">PrezimeVlasnika:</label>
                </div>
                <div class="col-20">
                   <input type="text" name="PrezimeVlasnika" value="<?php echo $PrezimeVlasnika?>" 
                   placeholder="Unesi prezime">
                </div>
                <div class="col-15">  
                </div>
                <div class="col-15">
                 <label for="ImeVlasnika">ImeVlasnika:</label>
                 </div>
                 <div class="col-20">
                 <input  type="text"  name="ImeVlasnika" value="<?php echo $ImeVlasnika?>" 
                    placeholder="Unesi ImeVlasnika">
                </div>
            </div>


            <div class="row">
                <div class="col-15">
                    <label for="mail1">mail1:</label>
                </div>
                <div class="col-30">
                  <input  type="text"  name="mail1" value="<?php echo $mail1?>" 
                placeholder="Unesi mail ">
                </div>
                <div class="col-5">  
                </div>
                <div class="col-15">
                 <label for="PoslovniTelefon1">PoslovniTelefon1:</label>
                 </div>
                 <div class="col-30">
                 <input  type="text"  name="PoslovniTelefon1" value="<?php echo $PoslovniTelefon1?>" 
            placeholder="Unesi PoslovniTelefon1">
                </div>
            </div>

            <div class="row">
                <div class="col-15">
                    <label for="MobilniTelefon1">MobilniTelefon1:</label>
                </div>
                <div class="col-30">
                   <input  type="text"  name="MobilniTelefon1" value="<?php echo $MobilniTelefon1?>" 
                    placeholder="Unesi MobilniTelefon1 ">
                </div>
                <div class="col-5">  
                </div>
                <div class="col-15">
                  
                 <label for="PrezimeKontaktLice">KontaktLicePrez:</label>
                 </div>
                 <div class="col-30">
                 <input  type="text"  name="PrezimeKontaktLice" value="<?php echo $PrezimeKontaktLice?>" 
            placeholder="Unesi KontaktLice">
                </div>
            </div>

            <div class="row">
                <div class="col-15">
                    <label for="ImeKontaktLice">ImeKontaktLice:</label>
                </div>
                <div class="col-30">
                   <input  type="text"  name="ImeKontaktLice" value="<?php echo $ImeKontaktLice?>" 
                    placeholder="Unesi ImeKontaktLice ">
                </div>
                <div class="col-5">  
                </div>
                <div class="col-15">
                  
                 <label for="MobilniTelefon2">MobilniTelefon2:</label>
                 </div>
                 <div class="col-30">
                 <input  type="text"  name="MobilniTelefon2" value="<?php echo $MobilniTelefon2?>" 
            placeholder="Unesi MobilniTelefon2">
                </div>
            </div>
            
            
            <?php
            echo "Kliknite na Izmeni - Prihvati izmene da bi promenili sva polja zapisa"; ?>
            <?php include 'inlude/foother.php';?>   
            
            

             <?php }else
            echo "Za unos novog subjekta unesite Naziv subjekta i Prezime vlasnika - zatim kliknite na Sacuvaj";?><br><?php
            
            ?>  

            </div >
            <div>
                <table>
                    <tr>
                        <th colspan="2">
            <?php
            if ($update==true) {?>
                <button  type="submit" name="updateSubjekat" >Prihvati izmene</button>
            <?php }else{?>
                <button  type="submit"  name="saveSubjekat" >Sacuvaj</button>
                
           <?php }?>
                        </th>
                        <th><?php echo "Broj zapisa:" . $x;?></th>
                    </tr>
                </table>

                
            </div> 
        </form>

 <?php include 'inlude/script.php';?>
           
            
 

</body>
</html>