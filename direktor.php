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
  <a href="https://branko.lovestoblog.com" >Subjekti</a>
  <a href="https://branko.lovestoblog.com/projekat.php">Projekti</a>
  <a href="IzvrsiteljForm.php" class="active-link">Izvodjac</a>
  <a href="https://branko.lovestoblog.com/akta.php">Akta</a>
  <?php include 'inlude/dropdown.php';?>
   <?php
date_default_timezone_set("Europe/Belgrade");

?>
   
        <?php require_once 'proces_val_tables.php';?>


         <?php
        $mysqli = new mysqli("sql300.epizy.com", "epiz_30944424", "bvYl5uccfJfJ1CI", "epiz_30944424_mydb") 
        or die(mysqli_error($mysqli));

         

        $result= $mysqli->query("SELECT * FROM admin ORDER BY `admin`.`id` DESC")
                or die($mysqli->error);
        ?>   

        <div>
       
            <table>
                <thead>
           <th style="width:5%"><i class="fa fa-filter" style="font-size:24px;color:white;"></i></th> 
            <th class="thwidth"><input type="text" id="myInput" onkeyup="myFunction()" 
                class="pretrazi" title="Unesite ime" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th class="thwidth"><input type="text" id="myInput1" onkeyup="myFunction2()" 
                class="pretrazi" title="Unesite ime" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th><i class="fa fa-dedent" style="font-size:24px"></i></th> 
               </thead>
            </table>

               <table>
                <thead>
                <tr >     
                    <th style="width:5%">RBR</th>
                    <th class="thwidth">Ime</th> 
                    <th class="thwidth">Prezime</th> 
                    <th >Izmeni<i class="fa fa-envelope" style="color:white"></th>   
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
                     <td style="width:5%"><?php echo $x.". ";?></td>
                    <td class="thwidth1"><?php echo $row["firstname"];?></td>
                    <td class="thwidth1"><?php echo $row["lastname"];?></td>
                    <td>
                        <a href="direktor.php?editAdmin=<?php echo $row['id'];?>"
                           >Izmeni  -</a>
                        <a href="proces_val_tables.php?deleteAdmin=<?php echo $row['id'];?>"
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
          
         

        


        <form action="proces_val_tables.php"  method="post" id="izvrsilac">
        
         <?php
            if ($update==true) {?>
            <input type="text" name="username" value="<?php echo $username?>" 
                   readonly="readonly">
            <input type="text" name="id" value="<?php echo $id?>" 
            
            <label>Unesi podatke:</label>
             <input type="text" name="firstname" autofocus value="<?php echo $firstname?>" 
                    placeholder="Unesi ime" title="Obavezno polje!" 
                    onclick="document.getElementById('demo').style.display = 'none'"><br>
           
            <input type="text" name="lastname" value="<?php echo $lastname?>" 
                   placeholder="Unesi prezime">

            
             <input  type="text"  name="email" value="<?php echo $email?>" 
            placeholder="Unesi email" title="Unesi email" required>
             <input  type="text"  name="reg_date" value="<?php echo $reg_date?>" 
            placeholder="Datum registracije" title="Datum registracije" readonly="readonly">
            <input  type="text"  name="Firma" value="<?php echo $Firma?>" 
            placeholder="Unesi Firma" title="Unesi maticnu firmu">
                <select name="PozicijaUfirmi" id="pozicija" form="izvrsilac" title="PozicijaUfirmi">
                    <option value="<?php echo $PozicijaUfirmi?>"><?php echo $PozicijaUfirmi?></option>
                    <option value="Direktor">Direktor</option>
                    <option value="Menadzer">Menadzer</option>
                    <option value="Referent">Referent</option>
                </select>
             <input  type="text"  name="PoslovniTelefon" value="<?php echo $PoslovniTelefon?>" 
            placeholder="Unesi PoslovniTelefon">
             <input  type="text"  name="KucniTelefon" value="<?php echo $KucniTelefon?>" 
            placeholder="Unesi KucniTelefon ">
              <input  type="text"  name="MobilniTelefon" value="<?php echo $MobilniTelefon?>" 
            placeholder="Unesi MobilniTelefon ">
             <input  type="text"  name="UlicaIBroj" value="<?php echo $UlicaIBroj?>" 
            placeholder="Unesi adresu: UlicaIBroj">
            <input  type="text"  name="Grad" value="<?php echo $Grad?>" 
            placeholder="Unesi adresu: Grad">
             <input  type="text"  name="Drzava" value="<?php echo $Drzava?>" 
            placeholder="Unesi adresu: Drzava">
             <input  type="text"  name="PostanskiBroj" value="<?php echo $PostanskiBroj?>" 
            placeholder="Unesi PostanskiBroj">
             <input  type="text"  name="Web" value="<?php echo $Web?>" 
            placeholder="Web ">
              <input  type="text"  name="Beleske" value="<?php echo $Beleske?>" 
            placeholder="Unesi bitne beleske ">


             <?php }else
             echo "Za unos novog adminstratora  kliknite na 'Unesi novog administratora'";?><br><?php
            echo "Kliknite na 'Izmeni' - 'Prihvati izmene' da bi promenili sva polja zapisa";
              ?>       



            </div >
            <div>
                <table>
                    <tr>
                        <th colspan="2">
            <?php
            if ($update==true) {?>
                <button  type="submit" name="updateAdmin" >Prihvati izmene</button>
            <?php }else{?>
                <a   href="registerdir.php" style="color:white;">Unesi novog administratora</a>
                
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