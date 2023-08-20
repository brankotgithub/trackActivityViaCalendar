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
  <a href="https://branko.lovestoblog.com">Subjekti</a>
  <a href="https://branko.lovestoblog.com/projekat.php">Projekti</a>
  <a href="https://branko.lovestoblog.com/IzvrsiteljForm.php">Izvodjac</a>
  <a href="akta.php" class="active-link">Akta</a>
  
 <?php include 'inlude/dropdown.php';?>

<?php
date_default_timezone_set("Europe/Belgrade");

?>
        
  <?php require_once 'proces_val_tables.php';?>
        <?php
        $mysqli = new mysqli("sql300.epizy.com", "epiz_30944424", "bvYl5uccfJfJ1CI", "epiz_30944424_mydb") 
        or die(mysqli_error($mysqli));
        
        $resultSubjekat= $mysqli->query("SELECT * FROM subjekat ORDER BY `subjekat`.`idSubjekat` DESC")
                or die($mysqli->error);
           
        $resultProjekat= $mysqli->query("SELECT * FROM projekat ORDER BY `projekat`.`idProjekat` DESC")
                or die($mysqli->error);
         
        $resultIzvodjac= $mysqli->query("SELECT * FROM izradjivac ORDER BY `izradjivac`.`id` ")
                or die($mysqli->error);  
      
        
        

        $resultAkta= $mysqli->query("SELECT * FROM akta ORDER BY `akta`.`idAkta` DESC" )
                or die($mysqli->error);
        ?>   
  
  <div>
            <table>
                <thead>
            <th style="width:5%"><i class="fa fa-filter" style="font-size:24px;color:white;"></i></th>
            <th ><input type="text" id="myInput" onkeyup="myFunction()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th class="thwidthAkta"><input type="text" id="myInput1" onkeyup="myFunction2()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th>    
            <th class="thwidthAkta"><i class="fa fa-columns" style="font-size:24px;color:white"></i>Akta</th> 
               </thead>
            </table>

               <table>
                <thead>
                <tr >     
                    <th rowspan="2" style="width:5%">RBR</th>
                    <th  rowspan="2">Naziv akta</th>
                    <th class="thwidthAkta">Subjekat - Projekat</th> 
                    
                    <th  class="thwidthAkta" rowspan="2">Izmeni-Obrisi-<i class="fa fa-envelope" style="color:white"></th>   
                </tr>
                
                <tr >     
                    <th class="thwidthAkta">Izvodjac</th>   
                </tr>
                </thead>
            </table>
            
            <div class="plutanje">
                           
        <table   id="myTable"> 
               <?php 
               $x=0; 
               while($rowAkta = $resultAkta->fetch_assoc()){ 
                   $x=$x+1;
                  
                  // upis u tabelu na stranici akta vrednosti iz tabela subjekti, iyvodjac i projekat
                    $idSubjekat=$rowAkta["SubjekatID"];
                        
                            $resultSubjeat=$mysqli->query("SELECT * FROM subjekat WHERE idSubjekat=$idSubjekat") or die (mysqli_error($mysqli));
                            if (is_iterable($resultSubjeat)){
                                $row=$resultSubjeat->fetch_array();
                                if ($row['NazivSubjekta']){
                                $NazivSubjekta=$row['NazivSubjekta']; 
                                } else {
                                    $NazivSubjekta='<span class="spam">11111</span>';
                                    }}

                     $idProjekat=$rowAkta["ProjekatID"];
                        
                            $resultProjeat=$mysqli->query("SELECT * FROM projekat WHERE idProjekat=$idProjekat") or die (mysqli_error($mysqli));
                            if (is_iterable($resultProjeat)){
                                $row=$resultProjeat->fetch_array();
                                if ($row['NazivProjekta']){
                                $NazivProjekta=$row['NazivProjekta']; 
                                } else {
                                    $NazivProjekta='<span class="spam">11111</span>';
                                    }}
                  
                    $id=$rowAkta["IzradjivacID"];
                        
                            $resultIzradjivac=$mysqli->query("SELECT * FROM izradjivac WHERE id=$id") or die (mysqli_error($mysqli));
                            if (is_iterable($resultIzradjivac)){
                                $row=$resultIzradjivac->fetch_array();
                                if ($row['firstname']){
                                $firstname=$row['firstname']; 
                                $lastname=$row['lastname'];
                                } else {
                                    $firstname='<span class="spam">11111</span>';
                                    }}
                   ?>
                
                
                <tr>
                    <td style="width:5%"><?php echo $x.". ";?></td>
                    <td><?php echo $rowAkta["NazivAkta"];?></td>
                    <td class="thwidthAkta">
                    
                    <?php echo $NazivSubjekta;?><hr style="margin:0px 0px">
                    <?php echo $NazivProjekta;?><hr style="margin:0px 0px">
                    <?php echo $firstname." ".$lastname;?></td>
                    
                    
                    <td class="thwidthAkta">
                        <a href="akta.php?editAkta=<?php echo $rowAkta['idAkta'];?>"
                           >Izmeni  -</a>
                        <a href="proces_val_tables.php?deleteAkta=<?php echo $rowAkta['idAkta'];?>"
                           >Arhiviraj  -</a>
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
            

        <form action="proces_val_tables.php"  method="post" id="akta">
            
            <input  type="hidden" name="idAkta" value="<?php echo $idAkta?>">
            

            <?php
            if ($update==false) {?>

            <select name="SubjekatID" required>
            <option value="" disabled selected hidden>Unesi subjekat</option>
            <?php while($row1 = mysqli_fetch_array($resultSubjekat)):;?>
            <option  value="<?php echo $row1[0];?>"><?php echo $row1[0]." ".$row1[1];?></option>
            <?php endwhile;?>
            </select>
            <select name="ProjekatID" required>
            <option value="" disabled selected hidden>Unesi projekat</option>
            <?php while($row1 = mysqli_fetch_array($resultProjekat)):;?>
            <option  value="<?php echo $row1[0];?>"><?php echo $row1[0]." ".$row1[1];?></option>
            <?php endwhile;?>
            </select>
            <select name="IzradjivacID" required>
            <option value="" disabled selected hidden>Unesi izvodjaca</option>
            <?php while($row1 = mysqli_fetch_array($resultIzvodjac)):;?>
            <option  value="<?php echo $row1[0];?>"><?php echo $row1[0]." ".$row1[1]." ".$row1[2];?></option>
            <?php endwhile;?>
            </select>

            <input type="text" name="NazivAkta" autofocus value="<?php echo $NazivAkta?>" 
                    placeholder="Unesi naziv akta" title="Obavezno polje!" 
                    onclick="document.getElementById('demo').style.display = 'none'"><br>
            

            <?php } ?>
            



             
           

            <?php
            if ($update==true) {?> 

             <div class="row">
                <div class="col-20">
                    <label for="SubjekatID">Subjekat:</label>
                </div>
                
                <div class="col-80">
                <select name="SubjekatID" required>
                    <option value="<?php echo $SubjekatID?>" >
                    <?php 
                    $resultSubjekatForma= $mysqli->query("SELECT * FROM subjekat WHERE idSubjekat=$SubjekatID ")
                   or die($mysqli->error);
                    $rowSubjForma=$resultSubjekatForma->fetch_array();
                                $NazivSubjekta=$rowSubjForma['NazivSubjekta'];
                    echo $SubjekatID." ".$NazivSubjekta;
                    
                    ?>
                    </option>

                    <?php while($row1 = mysqli_fetch_array($resultSubjekat)):;?>
                    <option  value="<?php echo $row1[0];?>"><?php echo $row1[0]." ".$row1[1];?></option>
                    <?php endwhile;?>
                </select>
                </div>
                </div>
            <div class="row">
            <div class="col-20">
                    <label for="ProjekatID">Projekat:</label>
                </div>
                <div class="col-80">
                <select name="ProjekatID" required>
                    <option value="<?php echo $ProjekatID?>">
                    <?php 
                     $resultProjekatForma= $mysqli->query("SELECT * FROM projekat WHERE idProjekat=$ProjekatID ")
                    or die($mysqli->error);
                    $rowProjForma=$resultProjekatForma->fetch_array();
                                $NazivProjekta=$rowProjForma['NazivProjekta']; 

                    echo $ProjekatID." ".$NazivProjekta;
                    
                    ?>
                    </option>

                    <?php while($row1 = mysqli_fetch_array($resultProjekat)):;?>
                    <option  value="<?php echo $row1[0];?>"><?php echo $row1[0]." ".$row1[1];?></option>
                    <?php endwhile;?>
                </select>
                </div>
            </div>

            

             <div class="row">  
                <div class="col-20">
                    <label for="IzradjivacID">Izradjivac-DatumKreirAkta:</label>
                </div>
                <div class="col-40">
                <select name="IzradjivacID" required>
                   
                    <option value="<?php echo $IzradjivacID?>" >
                    <?php 
                    $resultIzvodjacForma= $mysqli->query("SELECT * FROM izradjivac WHERE id=$IzradjivacID ")
                   or die($mysqli->error);
                   $rowForma=$resultIzvodjacForma->fetch_array();
                            $IzradjivacID=$rowForma['id'];
                            $firstname=$rowForma['firstname']; 
                            $lastname=$rowForma['lastname'];
                    echo $IzradjivacID." ".$firstname." ".$lastname;
                    ?>
                    </option>

                    <?php while($row1 = mysqli_fetch_array($resultIzvodjac)):;?>
                    <option  value="<?php echo $row1[0];?>"><?php echo $row1[0]." ".$row1[1]." ".$row1[2];?></option>
                    <?php endwhile;?>
                </select>
                </div>
                <div class="col-40">

                <input  type="text"  name="DatumKreiranjaAkta" value="<?php 
                    $date=date_create("$DatumKreiranjaAkta");
                    echo date_format($date,"Y/m/d H:i:s");
                    ?>" 
                    title="datum kreiranja akta" readonly="readonly">

                 
                </div>
            </div>
            
            
            <div class="row">
             <div class="col-20">
             <label for="NazivAkta">NazivAkta i BrojUgovora:</label>
             </div>
                <div class="col-60">
                <input type="text" name="NazivAkta" autofocus value="<?php echo $NazivAkta?>" 
                    placeholder="Unesi naziv akta" title="Obavezno polje!" 
                    onclick="document.getElementById('demo').style.display = 'none'">
                </div>
                <div class="col-20">
                <input type="text" name="BrojUgovora"  value="<?php echo $BrojUgovora?>" 
                    placeholder="Unesi broj" title="BrojUgovora">
                </div>
            </div><hr style="margin:0px 0px">

             

            <div class="row">
                <div class="col-15">
                    <label for="StatusPoUgovoru">StatusPoUgovoru:</label>
                </div>
                <div class="col-30">
                <select  name="StatusPoUgovoru"  title="StatusPoUgovoru?">
                    <option value="<?php echo $StatusPoUgovoru?>" ><?php echo $StatusPoUgovoru?></option>
                    <option value="Osnovni">Osnovni</option>
                    <option value="Ažuriranje">Ažuriranje</option>
                    <option value="IspravkaZahtevMUP">IspravkaZahtevMUP</option>
                    <option value="IspravkaZahtevSub">IspravkaZahtevSub</option>
                </select>

                    
                </div>
                <div class="col-15">  
                </div>
                <div >
                 <label for="DatumUgovora">DatumUgovora:</label><input  type="date"  name="DatumUgovora"  value="<?php 
                    $date=date_format(date_create("$DatumUgovora"),"Y-m-d");
                    echo $date;?>">
                </div>
            </div>

             <div class="row">
                <div class="col-15">
                    <label for="StatusProcesaIzrade1">StatusProcIzradeIzr:</label>
                </div>
                <div class="col-30">

                <select  name="StatusProcesaIzrade1" id="StatusProcesaIzrade1" form="akta" title="StatusProcesaIzradeIzr?">
                    <option value="<?php echo $StatusProcesaIzrade1?>" ><?php echo $StatusProcesaIzrade1?></option>
                    <option value="U radu prvi put">U radu prvi put</option>
                    <option value="U radu -ažuriranje">U radu ažuriranje</option>
                    <option value="U radu -dopuna">U radu -dopuna</option>
                    <option value="U radu -problem">U radu -problem</option>
                    <option value="Završen">Završen</option>
                    <option value="Završen-stampa ">Završen-stampa</option>
                </select>
                </div>

                
                <div class="col-15">
                    <label for="StatusProcesaIzrade2">StatusProcIzradeDir:</label>
                </div>
                <div class="col-40">

                <select  name="StatusProcesaIzrade2" id="StatusProcesaIzrade2" form="akta" title="StatusProcesaIzradeDir?">
                    <option value="<?php echo $StatusProcesaIzrade2?>" ><?php echo $StatusProcesaIzrade2?></option>
                    <option value="Stampa">Stampa</option>
                    <option value="Poslat naručiocu">Poslat naručiocu</option>
                    <option value="Vraćen od naručioca">Vraćen od naručioca</option>(razlog)
                    <option value="Nije isporučen-nepoznata lokacija">Nije isporučen-nepoznata lokacija</option>
                    <option value="Nije isporučen-poznata lokacija">Nije isporučen-poznata lokacija</option>
                    <option value="Završen-izdat račun ">Završen-izdat račun</option>
                    <option value="Završen-nije naplaćen u roku ">Završen-nije naplaćen u roku</option>
                </select>

                </div>
            </div><hr style="margin:0px 0px">

            <div class="row">
                <div class="col-20">
                    <label for="ZavrsetakIzrade">DatumZavrsetakIzr:</label>
                </div>
                <div class="col-20">
                    <input type="date" name="ZavrsetakIzrade"  value="<?php 
                        $date=date_format(date_create("$ZavrsetakIzrade"),"Y-m-d");
                        echo $date;?>">
                </div>
                <div class="col-5">
                </div>
                <div class="col-20">
                    <label for="DatumSlanjaAktaSub">DatumSlanjaAktaSub:</label>
                </div>

                <div class="col-20">
                    <input type="date" name="DatumSlanjaAktaSub"  value="<?php 
                        $date=date_format(date_create("$DatumSlanjaAktaSub"),"Y-m-d");
                        echo $date;?>">
                </div>
            </div>


            <div class="row">
                <div class="col-20">
                    <label for="AzuriranjeAkta">DatumVracenNaDoradu:</label>
                </div>
                <div class="col-20">
                    <input type="date" name="AzuriranjeAkta"  value="<?php 
                        $date=date_format(date_create("$AzuriranjeAkta"),"Y-m-d");
                        echo $date;?>">
                </div>
                <div class="col-5">
                </div>
                <div class="col-20">
                    <label for="DatumDostavElemIzrPlana">DatumDostavElemIzrPlana:</label>
                </div>

                <div class="col-20">
                    <input type="date" name="DatumDostavElemIzrPlana"  value="<?php 
                        $date=date_format(date_create("$DatumDostavElemIzrPlana"),"Y-m-d");
                        echo $date;?>">
                </div>
            </div><hr style="margin:0px 0px">


            <div class="row">
                <div class="col-20">
                    <label for="DatumPoslatNadlOrganu">DatumPoslatNadlOrganu:</label>
                </div>
                <div class="col-20">
                    <input type="date" name="DatumPoslatNadlOrganu"  value="<?php 
                        $date=date_format(date_create("$DatumPoslatNadlOrganu"),"Y-m-d");
                        echo $date;?>">
                </div>
                <div class="col-5">
                </div>
                <div class="col-20">
                    <label for="DatumDobijanjaSaglasnostiAkta">DatumDobSaglasnostiAkta:</label>
                </div>

                <div class="col-20">
                    <input type="date" name="DatumDobijanjaSaglasnostiAkta"  value="<?php 
                        $date=date_format(date_create("$DatumDobijanjaSaglasnostiAkta"),"Y-m-d");
                        echo $date;?>">
                </div>
            </div>
           
           <div >
            <label for="Tekst">Unesite tekst (problemi, predlozi, komentari, obrazlozenja, instrukcije direktora...):</label>
            <textarea style="color:red;" value="<?php echo $Tekst?>" name="Tekst" ><?php echo $Tekst?></textarea>
            </div >
            
                    <hr style="margin:0px 0px">


            <div class="row">
                <div class="col-20">
                
                </div>
                <div class="col-20">
                    <label for="KonacanZavrsetak">KonacanZavrsetak:</label>
                </div>
                <div class="col-5">
                </div>
                <div class="col-20">
                    <input type="date" name="KonacanZavrsetak"  value="<?php 
                        $date=date_format(date_create("$KonacanZavrsetak"),"Y-m-d");
                        echo $date;?>">
                </div>
                
            </div><hr style="margin:0px 0px">
            

            <?php
            echo "Kliknite na Izmeni - Prihvati izmene da bi promenili sva polja zapisa"; ?>
            <?php include 'inlude/foother.php';?>  


             <?php }else
            echo "Forma za unos novog akta. Pre unosa naziva novog akta odaberite subjekat, projekat i izvodjaca (krirajte novi 
            ako ih nema u padajucem meniju)- zatim kliknite na Sacuvaj";?>

            </div >
            <div>
                <table>
                    <tr>
                        <th colspan="2">
            <?php
            if ($update==true) {?>
                <button  type="submit" name="updateAkta" >Prihvati izmene</button>
            <?php }else{?>
                <button  type="submit"  name="saveAkta" >Sacuvaj</button>
                
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