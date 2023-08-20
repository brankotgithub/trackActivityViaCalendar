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
     <?php include 'inlude/script.php';?>

    </head>
    

    <body class="center2">
    <?php include 'inlude/header.php';?>
      <div class="navbar2">
  <a href="https://branko.lovestoblog.com">Subjekti</a>
  <a href="https://branko.lovestoblog.com/projekat.php">Projekti</a>
  <a href="https://branko.lovestoblog.com/IzvrsiteljForm.php">Izvodjac</a>
  <a href="https://branko.lovestoblog.com/akta.php">Akta</a>
  <div class="dropdown2">
    <button class="dropbtn2">Preged/stampa 
      <i class="fa fa-caret-down"></i>
    </button>
    
    <div class="dropdown-content2">
         <div class="header">
        
      </div>
      <div class="row2">
        <div class="column2">
          <h3>Subjekti</h3>
          <a href="#">Aktivni</a>
          <a href="#">Naplaceni</a>
          <a href="#">Nenaplaceni</a>
          <a href="#">Nenaplaceni</a>
        </div>
        <div class="column2">
          <h3>Projekti</h3>
          <a href="#">Arhiva promena</a>
          <a href="#">Naplaceni</a>
          <a href="#">Nenaplaceni</a>
          <a href="#">Nenaplaceni</a>
        </div>
        <div class="column2">
          <h3>Akta</h3>
          <a href="tabela_stampa.php" class="active-link" >Pregled aktivnih akata</a>
          <a href="arhivirana_akta.php" >Arhiva promena u radu sa aktima</a>
          <a href="arhivirana_akta_stampa.php">Arhivirana akta</a>
          <a href="#">Zavrsena akta</a>
        </div>
      </div>
    </div>
  </div> 
</div>

<?php
date_default_timezone_set("Europe/Belgrade");
$tekst==false;
?>
        <a style="color:blue"; href="proces_val_tables.php?obrisitabelu=<?php echo $rowAkta['idAkta'];?>"
                           >Azuriraj tabelu  -</a><a style="color:blue"; href="proces_val_tables.php?tekstred=<?php $tekst;?>"
                           >Ukloni tekst-</a><b >PREGLED AKTIVNIH AKATA</b>
                           
  <?php require_once 'proces_val_tables.php';?>
        <?php
        $mysqli = new mysqli("sql300.epizy.com", "epiz_30944424", "bvYl5uccfJfJ1CI", "epiz_30944424_mydb") 
        or die(mysqli_error($mysqli));

    //pocetak tabela bez filtera

    if (!isset($_POST['generisiPregledPocetak'])){
			
        $result= $mysqli->query("SELECT * FROM spia_join ORDER BY lastname;" )
                or die($mysqli->error);

         $resultAkta= $mysqli->query("SELECT * FROM akta ORDER BY `akta`.`idAkta` DESC")
                or die($mysqli->error);

?>
  
  <div>
            <table>
                <thead>
            <th style="width:5%"><i class="fa fa-filter" style="font-size:24px;color:white;"></i></th>
            <th style="width:30%" ><input type="text" id="myInput" onkeyup="myFunction()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th style="width:25%"><input type="text" id="myInput1" onkeyup="myFunction2()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
              <th style="width:20%"><input type="text" id="myInput2" onkeyup="myFunction3()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th style="width:20%"><input type="text" id="myInput3" onkeyup="myFunction4()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
               </thead>
            </table>

               <table>
                <thead>
                <tr >     
                    <th rowspan="4" style="width:5%">RBR</th>
                    <th  style="width:30%">Subjekat-Projekat</th>  
                    <th style="width:25%">StatusPoUgov/DatumUgovora</th>  
                    <th style="width:20%">ZavrsIzr/AktPoslatSub</th>   
                    <th style="width:20%">PoslatNadlOrganu</th> 
                </tr>
                <tr >     
                    <th style="width:30%">
                   
                    <div  class="dropdownPocetak">
                        Izradjivac/Početak <i class="fa fa-caret-down"></i>
    
                    <div class="dropdown-contentPocetak">
                    <div style="border:solid;" class="header">
                         Unesite datume za dobijanje pregleda kreiranih akata u okviru definisanih datuma
                    </div>
                    <div style="height:150%;" class="formdiv">
                        <form   method="post" id="projekat">

                            <div class="row">
                            <div class="col-15">
                            </div>
                            <div class="col-15">
                                <label for="odDatumaPocetak">Od datuma:</label>
                            </div>
                            <div class="col-20">
                                <input type="date" name="odDatumaPocetak"  value="<?php 
                                    $date1=date_format(date_create("$odDatumaPocetak"),"d-m-Y");
                                    echo $date2;?>">
                            </div>
                            <div class="col-5">
                            </div>
                            <div class="col-15">
                                    <label for="doDatumaPocetak">Do datuma:</label>
                            </div>

                            <div class="col-20">
                                <input type="date" name="doDatumaPocetak"  value="<?php 
                                 $date2=date_format(date_create("$doDatumaPocetak"),"d-m-Y");
                                echo $date2;?>">
                            </div>
                        </div>

                         <button  type="submit"  name="generisiPregledPocetak" >Generisi pregled</button>

                        </form>
                    </div>
    
                    
                    
                    </th> 
                    <th style="width:25%">StatusProcesaIzrade-Izr</th> 
                    <th style="width:20%">VracenNaDoradu</th> 
                    <th style="width:20%">DobijenaSaglasnost</th>
                </tr>
                <tr >     
                    <th style="width:30%">Naziv akta/BrojUgovora</th> 
                    <th style="width:25%">StatusProcesaIzrade-Dir</th> 
                    <th style="width:20%">DostavElemIzrPlana</th> 
                    <th style="width:20%">KonacanZavrsetak</th>
                </tr>
                <tr >     
                    <th colspan="4">Tekst</th> 
                </tr>
                </thead>
            </table>
            
            
        <div class="plutanje">              
        <table   id="myTable"> 
               <?php 
               $x=0; 
               while($row = $result->fetch_assoc()){ 
                   $x=$x+1;
                
                $start_date = $row["DatumKreiranjaAkta"];  
                $date = strtotime($start_date);
                $date = strtotime("+21800 seconds", $date);

                $start_date1 = $row["DatumUgovora"];  
                $date1 = strtotime($start_date1);
                $date1 = strtotime("+21800 seconds", $date1);

                $start_date2 = $row["ZavrsetakIzrade"];  
                $date2 = strtotime($start_date2);
                $date2 = strtotime("+21800 seconds", $date2);

                $start_date3 = $row["DatumPoslatNadlOrganu"];  
                $date3 = strtotime($start_date3);
                $date3 = strtotime("+21800 seconds", $date3);

                $start_date4 = $row["AzuriranjeAkta"];  
                $date4 = strtotime($start_date4);
                $date4 = strtotime("+21800 seconds", $date4);

                $start_date5 = $row["DatumDostavElemIzrPlana"];  
                $date5 = strtotime($start_date5);
                $date5 = strtotime("+21800 seconds", $date5);

                $start_date6 = $row["DatumPoslatNadlOrganu"];  
                $date6 = strtotime($start_date6);
                $date6 = strtotime("+21800 seconds", $date6);

                $start_date7 = $row["DatumDobijanjaSaglasnostiAkta"];  
                $date7 = strtotime($start_date7);
                $date7 = strtotime("+21800 seconds", $date7);

                $start_date8 = $row["KonacanZavrsetak"];  
                $date8 = strtotime($start_date8);
                $date8 = strtotime("+21800 seconds", $date8);
                

                ?>

                <tr style="border:solid"  onclick="window.location='akta.php?editAkta=<?php echo $row['idAkta'];?>'" >
                    <td rowspan="2" style="width:5%"><?php echo $x.". ";?></td>
                    <td style="width:30%">
                     <?php echo $row["NazivSubjekta"]." | ".$row["NazivProjekta"];?><hr style="margin:0px 0px">
                    <?php echo $row["firstname"]." ".$row["lastname"]." | ".date('d.m.Y.', $date);?><hr style="margin:0px 0px">
                   
                    <?php echo $row["NazivAkta"]." | ".$row["BrojUgovora"];?>
                    </td>
                    <td style="width:25%">
                    <?php echo $row["StatusProcesaIzrade1"]." | ".date('d.m.Y.', $date1);?><hr style="margin:0px 0px">
                     <?php echo $row["StatusProcesaIzrade1"];?><hr style="margin:0px 0px">
                     <?php echo $row["StatusProcesaIzrade2"];?>
                    </td>
                    
                    <td style="width:20%">
                    <?php echo date('d.m.Y.', $date2)." | ".date('d.m.Y.', $date3);?><hr style="margin:0px 0px">
                    <?php echo date('d.m.Y.', $date4);?><hr style="margin:0px 0px">
                    <?php echo date('d.m.Y.', $date5);?>
                    </td>

                    <td style="width:20%">
                    
                    
                    <?php echo date('d.m.Y.', $date6);?><hr style="margin:0px 0px">
                    <?php echo date('d.m.Y.', $date7);?><hr style="margin:0px 0px">
                    <?php echo date('d.m.Y.', $date8);?>
                    
                    </td>
                   
                </tr>
                 
                <tr style="border:solid">   
                  
                      <?php
                        if (!isset($_SESSION['masagetekstred'])){?>
                     <td     colspan="4"><?php echo $row["Tekst"];?></td>
                     <?php }else{?>
                     <td  hidden  colspan="4"><?php echo $row["Tekst"];?></td>
                     <?php }?>

                </tr>
                <?php 
                    }   unset($_SESSION['masagetekstred']);
                 ?>
                
            
            </table>    
             </div >    
           <table>
                    <tr>
                        
            
                        
                        <th><?php echo "Broj zapisa:" . $x;?></th>
                    </tr>
                </table>
        
           
            </div >

            
            <!--kraj tabele bez filtera i pocetak tabele sa filterom pocetak-->
            
   <?php } else {

        $odDatumaPocetak=date('Y-m-d',strtotime($_POST['odDatumaPocetak']));
		$doDatumaPocetak=date('Y-m-d',strtotime($_POST['doDatumaPocetak']));
				
        
         $od=strtotime("$odDatumaPocetak");
         $do=strtotime("$doDatumaPocetak");

// provera vrednosti datuma- pocetak koda ako su pravini datumi
         if ($do > $od){
				
echo "<span style='color:red;'> kreiranih u periodu od:</span>".date('d.m.Y.', $od)."<span style='color:red;'> do:</span>".date('d.m.Y.', $do);


 $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$odDatumaPocetak' and '$doDatumaPocetak' ORDER BY DatumKreiranjaAkta;" )
                or die($mysqli->error);

         $resultAkta= $mysqli->query("SELECT * FROM akta ORDER BY `akta`.`idAkta` DESC")
                or die($mysqli->error);

  
  
?>
  
  <div>
            <table>
                <thead>
            <th style="width:5%"><i class="fa fa-filter" style="font-size:24px;color:white;"></i></th>
            <th style="width:30%" ><input type="text" id="myInput" onkeyup="myFunction()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th style="width:25%"><input type="text" id="myInput1" onkeyup="myFunction2()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
              <th style="width:20%"><input type="text" id="myInput2" onkeyup="myFunction3()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th style="width:20%"><input type="text" id="myInput3" onkeyup="myFunction4()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
               </thead>
            </table>

               <table>
                <thead>
                <tr >     
                    <th rowspan="4" style="width:5%">RBR</th>
                    <th  style="width:30%">Subjekat-Projekat</th>  
                    <th style="width:25%">StatusPoUgov/DatumUgovora</th>  
                    <th style="width:20%">ZavrsIzr/AktPoslatSub</th>   
                    <th style="width:20%">PoslatNadlOrganu</th> 
                </tr>
                <tr >     
                    <th style="width:30%">
                   
                    <div  class="dropdownPocetak">
                        Izradjivac/Početak <i class="fa fa-caret-down"></i>
    
                    <div class="dropdown-contentPocetak">
                    <div style="border:solid;" class="header">
                         Unesite datume za dobijanje pregleda kreiranih akata u okviru definisanih datuma
                    </div>
                    <div style="height:150%;" class="formdiv">
                        <form   method="post" id="projekat">

                            <div class="row">
                            <div class="col-15">
                            </div>
                            <div class="col-15">
                                <label for="odDatumaPocetak">Od datuma:</label>
                            </div>
                            <div class="col-20">
                                <input type="date" name="odDatumaPocetak"  value="<?php 
                                    $date1=date_format(date_create("$odDatumaPocetak"),"d-m-Y");
                                    echo $date2;?>">
                            </div>
                            <div class="col-5">
                            </div>
                            <div class="col-15">
                                    <label for="doDatumaPocetak">Do datuma:</label>
                            </div>

                            <div class="col-20">
                                <input type="date" name="doDatumaPocetak"  value="<?php 
                                 $date2=date_format(date_create("$doDatumaPocetak"),"d-m-Y");
                                echo $date2;?>">
                            </div>
                        </div>

                         <button  type="submit"  name="generisiPregledPocetak" >Generisi pregled</button>

                        </form>
                    </div>
    
                    
                    
                    </th> 
                    <th style="width:25%">StatusProcesaIzrade-Izr</th> 
                    <th style="width:20%">VracenNaDoradu</th> 
                    <th style="width:20%">DobijenaSaglasnost</th>
                </tr>
                <tr >     
                    <th style="width:30%">Naziv akta/BrojUgovora</th> 
                    <th style="width:25%">StatusProcesaIzrade-Dir</th> 
                    <th style="width:20%">DostavElemIzrPlana</th> 
                    <th style="width:20%">KonacanZavrsetak</th>
                </tr>
                <tr >     
                    <th colspan="4">Tekst</th> 
                </tr>
                </thead>
            </table>
            
            
        <div class="plutanje">              
        <table   id="myTable"> 
               <?php 
               $x=0; 
               while($row = $result->fetch_assoc()){ 
                   $x=$x+1;
                
                $start_date = $row["DatumKreiranjaAkta"];  
                $date = strtotime($start_date);
                $date = strtotime("+21800 seconds", $date);

                $start_date1 = $row["DatumUgovora"];  
                $date1 = strtotime($start_date1);
                $date1 = strtotime("+21800 seconds", $date1);

                $start_date2 = $row["ZavrsetakIzrade"];  
                $date2 = strtotime($start_date2);
                $date2 = strtotime("+21800 seconds", $date2);

                $start_date3 = $row["DatumPoslatNadlOrganu"];  
                $date3 = strtotime($start_date3);
                $date3 = strtotime("+21800 seconds", $date3);

                $start_date4 = $row["AzuriranjeAkta"];  
                $date4 = strtotime($start_date4);
                $date4 = strtotime("+21800 seconds", $date4);

                $start_date5 = $row["DatumDostavElemIzrPlana"];  
                $date5 = strtotime($start_date5);
                $date5 = strtotime("+21800 seconds", $date5);

                $start_date6 = $row["DatumPoslatNadlOrganu"];  
                $date6 = strtotime($start_date6);
                $date6 = strtotime("+21800 seconds", $date6);

                $start_date7 = $row["DatumDobijanjaSaglasnostiAkta"];  
                $date7 = strtotime($start_date7);
                $date7 = strtotime("+21800 seconds", $date7);

                $start_date8 = $row["KonacanZavrsetak"];  
                $date8 = strtotime($start_date8);
                $date8 = strtotime("+21800 seconds", $date8);
                

                ?>

                <tr style="border:solid"  onclick="window.location='akta.php?editAkta=<?php echo $row['idAkta'];?>'" >
                    <td rowspan="2" style="width:5%"><?php echo $x.". ";?></td>
                    <td style="width:30%">
                     <?php echo $row["NazivSubjekta"]." | ".$row["NazivProjekta"];?><hr style="margin:0px 0px">
                    <?php echo $row["firstname"]." ".$row["lastname"]." | ".date('d.m.Y.', $date);?><hr style="margin:0px 0px">
                   
                    <?php echo $row["NazivAkta"]." | ".$row["BrojUgovora"];?>
                    </td>
                    <td style="width:25%">
                    <?php echo $row["StatusProcesaIzrade1"]." | ".date('d.m.Y.', $date1);?><hr style="margin:0px 0px">
                     <?php echo $row["StatusProcesaIzrade1"];?><hr style="margin:0px 0px">
                     <?php echo $row["StatusProcesaIzrade2"];?>
                    </td>
                    
                    <td style="width:20%">
                    <?php echo date('d.m.Y.', $date2)." | ".date('d.m.Y.', $date3);?><hr style="margin:0px 0px">
                    <?php echo date('d.m.Y.', $date4);?><hr style="margin:0px 0px">
                    <?php echo date('d.m.Y.', $date5);?>
                    </td>

                    <td style="width:20%">
                    
                    
                    <?php echo date('d.m.Y.', $date6);?><hr style="margin:0px 0px">
                    <?php echo date('d.m.Y.', $date7);?><hr style="margin:0px 0px">
                    <?php echo date('d.m.Y.', $date8);?>
                    
                    </td>
                   
                </tr>
                 
                <tr style="border:solid">   
                  
                      <?php
                        if (!isset($_SESSION['masagetekstred'])){?>
                     <td     colspan="4"><?php echo $row["Tekst"];?></td>
                     <?php }else{?>
                     <td  hidden  colspan="4"><?php echo $row["Tekst"];?></td>
                     <?php }?>

                </tr>
                <?php 
                    }   unset($_SESSION['masagetekstred']);
                 ?>
                
            
            </table>    
             </div >    
           <table>
                    <tr>
                        
            
                        
                        <th><?php echo "Broj zapisa:" . $x;?></th>
                    </tr>
                </table>
        
           
            </div >
<?php
    //kraj provere datuma
         } else echo "<h4 style='color:red;'> Datum 'Do' mora biti veci od datuma 'Od'! Za ponovni pregled kliknite na 'Azuriraj tabelu'</h4>";
  
    //kraj tabele sa filterom pocetak- zagrada za prethodni else
      }
    ?>
    
    </body>
</html>