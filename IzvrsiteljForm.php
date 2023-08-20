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

         

        $result= $mysqli->query("SELECT * FROM izradjivac ORDER BY `izradjivac`.`id` DESC")
                or die($mysqli->error);
        ?>   

        <div>
       
            <table>
                <thead>
            <th style="width:5%"><i class="fa fa-filter" style="font-size:24px;color:white;"></i></th>
            <th class="thwidth"><input type="text" id="myInput" onkeyup="myFunction()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th class="thwidth"><input type="text" id="myInput1" onkeyup="myFunction2()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th><i class="fa fa-dedent" style="font-size:24px"></i></th> 
               </thead>
            </table>

               <table>
                <thead>
                <tr >     
                    <th style="width:5%">RBR</th>
                    <th class="thwidth">Prezime i ime</th> 
                    <th class="thwidth">Broj aktivnih akata po izvodjacu</th> 
                    <th >Izmeni<i class="fa fa-envelope" style="color:white"></th>   
                </tr>
                </thead>
            </table>
            
            <div class="plutanje">

       
            
        <?php
        if (!isset($_SESSION['masage1'])){?> 

        <table   id="myTable"> 
               <?php 
               $x=0; 
               while($row = $result->fetch_assoc()){ 
                   $x=$x+1;
                
                $id= $row["id"];
                 $resultBrojAkata= $mysqli->query("SELECT * FROM akta WHERE IzradjivacID=$id")
                or die($mysqli->error);
                 $y=0;
                while($rowBrojAkata = $resultBrojAkata->fetch_assoc()){ 
                   $y=$y+1;
                }
                   
                   
                   ?>
                
                <tr>
                    <td style="width:5%"><?php echo $x.". ";?></td>
                    <td class="thwidth1"><?php echo $row["lastname"]." ".$row["firstname"];?></td>
                    <td class="thwidth1" style="text-align:center;"><?php echo $y;?></td>
                    <td>
                        <a href="proces_val_tables.php?aktivnostiIzvrs=<?php echo $row['id'];?>"
                           >Aktivnosti-</a>
                        <a href="IzvrsiteljForm.php?edit=<?php echo $row['id'];?>"
                           >Izmeni  -</a>
                        <a href="proces_val_tables.php?delete=<?php echo $row['id'];?>"
                           ></a>
                        
                        <a href="#"
                           ><i class="fa fa-envelope" style="color:blue"></i></a>
                    </td>
                    </tr>
<?php 
unset($_SESSION['masage1']);}   
                ?>
            
            </table> 
<?php 
             
             }else{
             $id=$_SESSION['masage1'];
             $result1= $mysqli->query("SELECT * FROM izradjivac WHERE id=$id")
                or die($mysqli->error);
                $row1 = $result1->fetch_assoc();
                ?>
             <table>


             <tr>
                    <td style="width:5%"><?php echo $x.". ";?></td>
                    <td class="thwidth1"><?php echo $row1["lastname"]." ".$row1["firstname"];?></td>
                    <td class="thwidth1"><?php echo $x.". ";?></td>
                    <td>
                        
                        <a href="IzvrsiteljForm.php?edit=<?php echo $row1['id'];?>"
                           >Izmeni  -</a>
                        <a href="proces_val_tables.php?delete=<?php echo $row1['id'];?>"
                           ></a>
                        
                        <a href="#"
                           ><i class="fa fa-envelope" style="color:blue"></i></a>
                    </td>
                    </tr>

             </table>
             <table>
             <thead>
                <tr >     
                    <th style="width:5%">RBR</th>
                    <th class="thwidth">Akt</th> 
                    <th class="thwidth">Projekat</th> 
                    <th class="thwidth">Subjekat</th>   
                </tr>
                </thead>
                </table>

             <table>
               <?php 
               $x=0; 

               include 'inlude/create_spia.php';
               
               $result2= $mysqli->query("SELECT * FROM spia_join WHERE id=$id")
                or die($mysqli->error);
               while($row2 = $result2->fetch_assoc()){ 
                   $x=$x+1?> 
             <tr>
                    <td style="width:5%"><?php echo $x.". ";?></td>
                    <td class="thwidth1"><?php echo $row2["NazivAkta"];?></td>
                    <td class="thwidth1"><?php echo $row2["NazivProjekta"];?></td>
                    <td class="thwidth1"><?php echo $row2["NazivSubjekta"];?></td>
                    
                    </tr>
                <?php 
             
             }?>
            </table>
            <?php 
             
             unset($_SESSION['masage1']);
             }

             ?>

             
           
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
             
           
          
         

        


        <form action="proces_val_tables.php"  method="post" id="izvrsilac">
        
         <?php
            if ($update==true) {?>
            <input type="hidden" name="id" value="<?php echo $id1?>">
            <input type="text" name="username" value="<?php echo $username?>" 
                   readonly="readonly">
             
            
            <div class="row">
                <div class="col-5">
                    <label for="firstname">Ime:</label>
                </div>
                <div class="col-30">
                   <input  type="text"  name="firstname" value="<?php echo $firstname?>" 
                    placeholder="Unesi Ime">
                </div>
                <div class="col-5">  
                </div>
                <div class="col-15">
                  
                 <label for="lastname">Prezime:</label>
                 </div>
                 <div class="col-40">
                 <input  type="text"  name="lastname" value="<?php echo $lastname?>" 
                    placeholder="Unesi prezime">
                </div>
            </div>



            <div class="row">
                <div class="col-5">
                    <label for="email">email:</label>
                </div>
                <div class="col-40">
                   <input  type="text"  name="email" value="<?php echo $email?>" 
                    placeholder="Unesi email">
                </div>
                <div class="col-5">  
                </div>
                <div class="col-15">
                  
                 <label for="reg_date">Dat. registracije:</label>
                 </div>
                 <div class="col-30">
                 <input  type="text" readonly="readonly" name="reg_date" value="<?php echo $reg_date?>" 
                placeholder="Datum registracije">
                </div>
            </div>


             <div class="row">
                <div class="col-5">
                    <label for="Firma">Firma:</label>
                </div>
                <div class="col-40">
                   <input  type="text"  name="Firma" value="<?php echo $Firma?>" 
                    placeholder="Unesi maticnu firmu">
                </div>
                <div class="col-5">  
                </div>
                <div class="col-15">
                  
                 <label for="PozicijaUfirmi">PozicijaUfirmi:</label>
                 </div>
                 <div class="col-30">
                 <select name="PozicijaUfirmi" id="pozicija" form="izvrsilac" title="PozicijaUfirmi">
                    <option value="<?php echo $PozicijaUfirmi?>"><?php echo $PozicijaUfirmi?></option>
                    <option value="Direktor">Direktor</option>
                    <option value="Menadzer">Menadzer</option>
                    <option value="Izradjivac">Izradjivac</option>
                </select>
                </div>
            </div>


            <div class="row">
                <div class="col-15">
                    <label for="PoslovniTelefon">PoslovniTelefon:</label>
                </div>
                <div class="col-30">
                   <input  type="text"  name="PoslovniTelefon" value="<?php echo $PoslovniTelefon?>" 
                    placeholder="Unesi PoslovniTelefon">
                </div>
                <div class="col-5">  
                </div>
                <div class="col-15">
                  
                 <label for="KucniTelefon">KucniTelefon:</label>
                 </div>
                 <div class="col-30">
                 <input  type="text"  name="KucniTelefon" value="<?php echo $KucniTelefon?>" 
                    placeholder="Unesi KucniTelefon ">
                </div>
            </div>

            <div class="row">
                <div class="col-15">
                    <label for="MobilniTelefon">MobilniTelefon:</label>
                </div>
                <div class="col-30">
                   <input  type="text"  name="MobilniTelefon" value="<?php echo $MobilniTelefon?>" 
                    placeholder="Unesi MobilniTelefon ">
                </div>
                <div class="col-5">  
                </div>
                <div class="col-5">
                  
                 <label for="UlicaIBroj">UlicaIBroj:</label>
                 </div>
                 <div class="col-5">  
                </div>
                 <div class="col-40">
                 <input  type="text"  name="UlicaIBroj" value="<?php echo $UlicaIBroj?>" 
                    placeholder="Unesi adresu: UlicaIBroj">
                </div>
            </div>

            <div class="row">
                <div class="col-15">
                    <label for="Grad">Grad:</label>
                </div>
                <div class="col-30">
                   <input  type="text"  name="Grad" value="<?php echo $Grad?>" 
                    placeholder="Unesi adresu: Grad">
                </div>
                <div class="col-5">  
                </div>
                <div class="col-5">
                  
                 <label for="Drzava">Drzava:</label>
                 </div>
                 <div class="col-5">  
                </div>
                 <div class="col-40">
                 <input  type="text"  name="Drzava" value="<?php echo $Drzava?>" 
                    placeholder="Unesi adresu: Drzava">
                </div>
            </div>
              
           
            <div class="row">
                <div class="col-15">
                    <label for="PostanskiBroj">PostanskiBroj:</label>
                </div>
                <div class="col-30">
                   <input  type="text"  name="PostanskiBroj" value="<?php echo $PostanskiBroj?>" 
                    placeholder="Unesi PostanskiBroj">
                </div>
                <div class="col-5">  
                </div>
                <div class="col-5">
                  
                 <label for="Web">Web:</label>
                 </div>
                 <div class="col-5">  
                </div>
                 <div class="col-40">
                 <input  type="text"  name="Web" value="<?php echo $Web?>" 
                    placeholder="Web ">
                </div>
            </div>

             <div >
            <label for="Beleske">Unesite beleske:</label>
            <textarea  value="<?php echo $Beleske?>" name="Beleske" ><?php echo $Beleske?></textarea>
            </div 

             <?php  include 'inlude/foother.php';}  else 
             echo "Za unos novog izvodjaca  kliknite na 'Unesi novog izvodjaca'";?><br><?php
            echo "Kliknite na 'Izmeni'da bi otvorili sva polja za izmene 'Prihvati izmene' da bi promenili sva polja zapisa";
             
              ?>       



            </div >
            <div>
                <table>
                    <tr>
                        <th colspan="2">
            <?php
            if ($update==true) {?>
                <button  type="submit" name="update" >Prihvati izmene</button>
            <?php }else{?>
                <a   href="register.php" style="color:white;">Unesi novog izvodjaca</a>
                
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