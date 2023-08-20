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
    

    <body class="center" >
    
    <?php include 'inlude/header.php';
    
   
    
    ?>
          
    <div class="navbar">
  <a href="https://branko.lovestoblog.com" >Subjekti</a>
  <a href="projekat.php" class="active-link">Projekti</a>
  <a href="https://branko.lovestoblog.com/IzvrsiteljForm.php">Izvodjac</a>
  <a href="https://branko.lovestoblog.com/akta.php">Akta</a>
  <?php include 'inlude/dropdown.php';?>
        <?php
date_default_timezone_set("Europe/Belgrade");

?>
        <?php require_once 'proces_val_tables.php';?>



         <?php
        $mysqli = new mysqli("sql300.epizy.com", "epiz_30944424", "bvYl5uccfJfJ1CI", "epiz_30944424_mydb") 
        or die(mysqli_error($mysqli));
        
        $result= $mysqli->query("SELECT * FROM projekat ORDER BY `projekat`.`idProjekat` DESC")
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
            <th><i class="fa fa-columns" style="font-size:24px;color:white"></i>Projekti</th> 
               </thead>
            </table>

               <table>
                <thead>
                <tr >     
                    <th style="width:5%">RBR</th>
                    <th class="thwidth">Naziv projekta</th> 
                    <th class="thwidth">Broj aktivnih akata po projektu</th> 
                    <th >Izmeni-Obrisi-<i class="fa fa-envelope" style="color:white"></th>   
                </tr>
                </thead>
            </table>
            
           <div class="plutanje">

           <?php
        if (!isset($_SESSION['masageProj'])){?> 
                           
        <table   id="myTable"> 
               <?php 
               $x=0; 
               while($row = $result->fetch_assoc()){ 
                   $x=$x+1;
                
                $idProjekat= $row["idProjekat"];
                 $resultBrojAkata= $mysqli->query("SELECT * FROM akta WHERE ProjekatID=$idProjekat")
                or die($mysqli->error);
                 $y=0;
                while($rowBrojAkata = $resultBrojAkata->fetch_assoc()){ 
                   $y=$y+1;
                }

                ?>


                <tr>
                    <td style="width:5%"><?php echo $x.". ";?></td>
                    <td class="thwidth1"><?php echo $row["NazivProjekta"];?></td>
                    <td class="thwidth1" style="text-align:center;"><?php echo $y;?></td>
                    <td>
                         <a href="proces_val_tables.php?aktivnostiProj=<?php echo $row['idProjekat'];?>"
                           >Aktivnosti-</a>
                        <a href="projekat.php?editProjekat=<?php echo $row['idProjekat'];?>"
                           >Izmeni  -</a>
                        <a href="proces_val_tables.php?deleteProjekat=<?php echo $row['idProjekat'];?>"
                           ></a>
                        <a href="#"
                           ><i class="fa fa-envelope" style="color:blue"></i></a>
                    </td>
                </tr>
              <?php 
            unset($_SESSION['masageProj']);}   
                ?>
            
            </table>    

            <?php 
             
             }else{
             $idProjekat=$_SESSION['masageProj'];
             $resultProj= $mysqli->query("SELECT * FROM projekat WHERE idProjekat=$idProjekat")
                or die($mysqli->error);
                $rowProj = $resultProj->fetch_assoc();
                ?>
             <table>


             <tr>
                    <td style="width:5%"><?php echo $x.". ";?></td>
                    <td class="thwidth1"><?php echo $rowProj["NazivProjekta"];?></td>
                    <td class="thwidth1"><?php echo $x.". ";?></td>
                    <td>
                        
                        <a href="projekat.php?editProjekat=<?php echo $rowProj['idProjekat'];?>"
                           >Izmeni  -</a>
                        <a href="proces_val_tables.php?deleteProjekat=<?php echo $rowProj['idProjekat'];?>"
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
                    <th class="thwidth">Akt/Status</th> 
                    <th class="thwidth">Ime i prezime</th>
                    <th class="thwidth">Subjekat</th>   
                </tr>
                </thead>
                </table>

             <table>
               <?php 
               $x=0; 
               $result2= $mysqli->query("SELECT * FROM spia_join WHERE idProjekat=$idProjekat")
                or die($mysqli->error);
               while($row2 = $result2->fetch_assoc()){ 
                   $x=$x+1?> 
             <tr>
                    <td style="width:5%"><?php echo $x.". ";?></td>
                    <td class="thwidth1"><?php echo $row2["NazivAkta"]."/ ".$row2["StatusProcesaIzrade1"];?></td>
                    <td class="thwidth1"><?php echo $row2["firstname"]." ".$row2["lastname"];?></td>
                    <td class="thwidth1"><?php echo $row2["NazivSubjekta"];?></td>
                    
                    </tr>
                <?php 
             
             }?>
            </table>
            <?php 
             
             unset($_SESSION['masageProj']);
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
             
           </div>   
             
        <form action="proces_val_tables.php"  method="post" id="projekat">
            <input type="hidden" name="idProjekat" value="<?php echo $idProjekat1?>"> 
            
            <input type="text" name="NazivProjekta" autofocus value="<?php echo $NazivProjekta?>" 
                   placeholder="Unesi naziv projekta" title="Obavezno polje!" 
                    onclick="document.getElementById('demo').style.display = 'none'"><br>
           
            
                

             <?php
            if ($update==true) {?>  

            <select name="StatusProjekta" id="status" form="projekat" title="Status projekta" placeholder="Unesi status projekta">
                    <option value="<?php echo $StatusProjekta?>"><?php echo $StatusProjekta?></option>
                    <option value="Predugovor">Predugovor</option>
                    <option value="Aktivan">Aktivan</option>
                    <option value="Zavrsen nenaplacen">Zavrsen nenaplacen</option>
                    <option value="Zavrsen nije isporucen">Zavrsen nije isporucen</option>
                    <option value="Zavrsen izdat racun">Zavrsen izdat racun</option>
                    <option value="Zavrsen nije naplacen u roku">Zavrsen nije naplacen u roku</option>
                    <option value="Zavrsen naplacen">Zavrsen naplacen</option>
                </select>


            <label for="DatumSklapanjaUgovora">DatumSklapanjaUgovora:</label>
            <input  type="date"  name="DatumSklapanjaUgovora" value="<?php 
            $date=date_format(date_create("$DatumSklapanjaUgovora"),"Y-m-d");
            echo $date;?>">
            <select name="IzdatRacun" id="status" form="projekat" title="Izdat racun?">
                    <option value="<?php echo $IzdatRacun?>"><?php echo $IzdatRacun?></option>
                    <option value="Ne">Ne</option>
                    <option value="Da">Da</option>
                </select>
            <select name="IzvrsenoPlacanje" id="status" form="projekat" title="Izvrseno placanje?">
                    <option value="<?php echo $IzvrsenoPlacanje?>"><?php echo $IzvrsenoPlacanje?></option>
                    <option value="Ne">Ne</option>
                    <option value="Da">Da</option>
                </select>

            <label for="DatumUplate">DatumUplate:</label>
            <input  type="date"  name="DatumUplate"  value="<?php 
            $date=date_format(date_create("$DatumUplate"),"Y-m-d");
            echo $date;?>">

            
             <input  type="text"  name="KorektivnaMera" value="<?php echo $KorektivnaMera?>" 
            placeholder="Unesi KorektivneMera" title="KorektivnaMera">
             <input  type="text"  name="Problemi" value="<?php echo $Problemi?>" 
            placeholder="Unesi Probleme" title="Unesi Probleme">
            <input  type="text"  name="KonacnaMera" value="<?php echo $KonacnaMera?>" 
            placeholder="Unesi KonacnuMera" title="Unesi KonacnuMeru">

            <label for="Azururanje">DatumAzururanje:</label>
            <input  type="date"  name="Azururanje" value="<?php 
            $date=date_format(date_create("$Azururanje"),"Y-m-d");
            echo $date;?>"> 
            

           
             <?php  include 'inlude/foother.php';}else
            echo "Za unos novog projekta unesite Naziv projekta zatim kliknite na Sacuvaj";?><br><?php
            echo "Kliknite na Izmeni - Prihvati izmene da bi promenili sva polja zapisa";
              ?>  



            </div >
            <div>
                <table>
                    <tr>
                        <th colspan="2">
            <?php
            if ($update==true) {?>
                <button  type="submit" name="updateProjekat" >Prihvati izmene</button>
            <?php }else{?>
                <button  type="submit"  name="saveProjekat" >Sacuvaj</button>
                
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