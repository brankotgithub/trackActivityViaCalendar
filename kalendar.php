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
     

    <body class="center2" >



    <?php include 'inlude/header.php';?>
      <div class="navbar">
  <a href="https://branko.lovestoblog.com" class="active-link">Subjekti</a>
  <a href="https://branko.lovestoblog.com/projekat.php">Projekti</a>
  <a href="https://branko.lovestoblog.com/IzvrsiteljForm.php">Izvodjac</a>
  <a href="https://branko.lovestoblog.com/akta.php">Akta</a>
  <?php include 'inlude/dropdown.php';?>

<?php
date_default_timezone_set("Europe/Belgrade");
setlocale(LC_TIME, array('sr_CS.UTF-8', 'sr.UTF-8'));
?>
        
  <?php require_once 'proces_val_tables.php';?>
        <?php
        
          
      
        /*
                $thisMesec=$_POST['thisMesec'];
                $thiGodina=$_POST['thiGodina'];
                $datum1Promena=$_POST['datum1Promena'];
                $datumD=$_POST['datumD'];

                

                 echo "zadani datum:".$datum1Promena."....-...";

                $time_input = strtotime("$datum1Promena"); 
                $date_input = getDate($time_input); 
                print_r($date_input);     
                
                $izabraniDanuMesecuSec=date_create();
                date_date_set($izabraniDanuMesecuSec,$date_input[year],$date_input[mon],$date_input[mday]);  
                $izabraniDatumBrojDanaod1970=(int)(($izabraniDanuMesecuSec->format('U'))/(3600*24));
                echo "izabraniDanuMesecuSecc/brojDanaod1970:".$izabraniDanuMesecuSec->format('U')."/".$izabraniDatumBrojDanaod1970."....-...";


                $prviDanuMesecuSec=date_create();
                date_date_set($prviDanuMesecuSec,date('Y'),date('m'),1);
                $prviDanuMesecuBrojDanaod1970=(int)(($prviDanuMesecuSec->format('U'))/(3600*24));
                echo "1 dan u tekucem mesecu  sec/brojDanaod1970:".$prviDanuMesecuSec->format('U')."/".$prviDanuMesecuBrojDanaod1970;

                $prviDanuMesecuWeekday=$prviDanuMesecuSec->format('N');
                 echo "prviDanuMesecuWeekday:".$prviDanuMesecuWeekday;

                 $prviDanuMesecuPlus60d = $prviDanuMesecuBrojDanaod1970+60;
                 echo "prviDanuMesecuPlus60d:".$prviDanuMesecuPlus60d;

                 $secPrviDanuMesecuPlus60d = (($prviDanuMesecuBrojDanaod1970 +60)*3600*24);
                 
                    $datumPrviDanuMesecuPlus60d = new DateTime("@$secPrviDanuMesecuPlus60d");
                    echo "datumPrviDanuMesecuPlus60d:".$datumPrviDanuMesecuPlus60d->format('U = Y-m-d H:i:s');

                   $date1=date_create($datum1Promena);
                    $date2=date_create();
                    date_date_set($date2,date('Y'),date('m'),date('d'));
                    $razlikaIzabraniDatumtrenutniDatum=date_diff($date1,$date2);
                    echo "razlikaIzabraniDatumtrenutniDatum:".$razlikaIzabraniDatumtrenutniDatum->format("%R%a days");

                   $d=cal_days_in_month(CAL_GREGORIAN,$date_input[mon],$date_input[year]);
 echo "There was $d-days in:".$date_input[month].$date_input[year];
                */
                   
                   
                   //pocetak 1. forme

                   
                   if ((!isset($_POST['numberdanD1php1'])) and (!isset($_POST['kalendarBaza']))){
                    
                 ?>
                 
                 <div style="line-height:1%" class="formdiv">
                        <form     method="post" id="projekat">

                            <div hidden class="row">
                                <div class="col-5">
                                <label for="dan1">Dan1.:</label>
                                </div>
                                <div class="col-5">
                                <input type="text" name="dan1" id="dan1" value="<?php echo "1";?>">
                                </div>
                                 <div class="col-5">
                                <label for="thisMesec">Mesec:</label>
                                </div>
                                <div class="col-15">
                                        <input type="text" name="thisMesec" id="mesecPromena2" value="<?php echo date('m');?>">
                                </div>
                                <div class="col-5">
                                <label for="thiGodina">Godina:</label>
                                </div>
                                <div class="col-15">
                                        <input type="text" name="thiGodina" id="godinaPromena2" value="<?php echo date('Y');;?>">
                                </div> 
                                
                                 <div class="col-20">
                                    <input type="text" name="datum1Promena" id="danPromena1" value="<?php 
                                        
                                        echo $datum1Promena;
                                        ?>">
                                  </div>   
                                     <div class="col-30">
                            <input type="text" name="datumD" id="danPromenaD" value="<?php 
                               
                               $prviDanuMesecuSec=date_create();
                                date_date_set($prviDanuMesecuSec,date('Y'),date('m'),1);
                               
                $prviDanuMesecuWeekday=$prviDanuMesecuSec->format('N');
                 echo $prviDanuMesecuWeekday;

                                     //echo $datumD;  // Output: Sat


                                /*switch (date('N')) {
                                    case "1":
                                        $dan="Ponedeljak";
                                    break;
                                    case "2":
                                        $dan="Utorak";
                                    break;
                                    case "3":
                                        $dan="Sreda";
                                    break;
                                    case "4":
                                        $dan="Cetvrtak";
                                    break;
                                    case "5":
                                        $dan="Petak";
                                    break;
                                    case "6":
                                        $dan="Subota";
                                    break;
                                    case "7":
                                        $dan="Nedelja";
                                    break;
                                    
                                    default:
                                        echo "!";
                                    }  
                                
                               echo $dan;*/

                    
                            ?>">
                             </div>
                            </div>
                            

                            <div class="row">
                            <div class="col-5">
                                <label for="danD">DanDD:</label>
                            </div>
                           <div class="col-15">
                                <input type="text" name="danDD" id="danDD" value="<?php echo date('j');?>">
                            </div>
                           
                             
                            <div class="col-5">
                                <label for="mesec">Mesec:</label>
                            </div>
                            <div class="col-20">
                            
                            
                            <select name="idMesec" id="mesecPromena" >
                            <option value="<?php ?>" >
                            <?php 
                            
                                 switch (date('m')) {
                                    case "1":
                                        $imeMesec="Januar";
                                    break;
                                    case "2":
                                        $imeMesec="Februar";
                                    break;
                                    case "3":
                                        $imeMesec="Mart";
                                    break;
                                    case "4":
                                        $imeMesec="April";
                                    break;
                                    case "5":
                                        $imeMesec="Maj";
                                    break;
                                    case "6":
                                        $imeMesec="Jun";
                                    break;
                                    case "7":
                                        $imeMesec="Jul";
                                    break;
                                    case "8":
                                        $imeMesec="Avgust";
                                    break;
                                    case "9":
                                        $imeMesec="Septembar";
                                    break;
                                    case "10":
                                        $imeMesec="Oktobar";
                                    break;
                                    case "11":
                                        $imeMesec="Novembar";
                                    break;
                                    case "12":
                                        $imeMesec="Decembar";
                                    break;
                                    default:
                                        echo "!";
                                    }  
                                
                               echo $imeMesec;
                    
                            ?>
                            </option>
                            
                            <?php 
                            $resultMesec= $mysqli->query("SELECT * FROM mesec  ")
                                or die($mysqli->error);
                            while($rowMesec = mysqli_fetch_array($resultMesec)):;?>
                            <option  value="<?php echo $rowMesec[0];?>"><?php echo $rowMesec[0]." ".$rowMesec[1];?></option>
                            <?php endwhile;?>
                            </select>

                            </div>
                           
                            <div class="col-5">
                                    <label for="godina">Godina:</label>
                            </div>

                            <div class="col-20">
                               


                            <select name="godina" id="godinaPromena">
                            <option value="" ><?php echo date('Y');?>
                            
                            </option>
                            
                            <?php 
                            $g=-5;
                            while($g <6 ):;
                            $g=$g+1;?>
                            
                            <option  value="<?php echo date('Y')+ $g;?>"><?php echo date('Y')+ $g;?></option>
                            <?php  endwhile;?>
                            </select>


                            </div>
                             <div class="col-30">
                            <input type="text" name="danD" id="danPromenaDD" value="<?php 
                               
                                 switch (date('N')) {
                                    case "1":
                                        $dan="Ponedeljak";
                                    break;
                                    case "2":
                                        $dan="Utorak";
                                    break;
                                    case "3":
                                        $dan="Sreda";
                                    break;
                                    case "4":
                                        $dan="Cetvrtak";
                                    break;
                                    case "5":
                                        $dan="Petak";
                                    break;
                                    case "6":
                                        $dan="Subota";
                                    break;
                                    case "7":
                                        $dan="Nedelja";
                                    break;
                                    
                                    default:
                                        echo "!";
                                    }  
                                
                               echo $dan;
                    
                            ?>">
                             </div>
                        </div>
                             <input   type="hidden"  name="numberdanD1php" id="numberdanD1php2">
                         
                             
                    </div>
                     
                

              </form>
            
            <div >

           
                           
            <div>
            <table>
                <thead>
            <th style="width:14%"> Ponedeljak</th>
            <th style="width:14%"> Utorak</th>
            <th style="width:14%"> Sreda</th>
            <th style="width:14%"> Cetvrtak</th>
            <th style="width:14%"> Petak</th>
            <th style="width:14%"> Subota</th>
            <th style="width:14%"> Nedelja</th>
            
               </thead>
            </table>
        
<form method="post">
       
        <?php
                $x=0; 
                
                 
                 $d=cal_days_in_month(CAL_GREGORIAN,$prviDanuMesecuSec->format('m'),$prviDanuMesecuSec->format('Y'));
                
               while($x < $prviDanuMesecuWeekday-1){ 
                   $x=$x+1;    
                     ?>
                  
                   <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3" name="<?php echo $x; ?>" id="<?php echo $x; ?>" 
                   ><?php 
                       
                      echo "0";
                       
                   
                   ?></textarea>
                   
            <?php }
            $y=0;
            while($y < $d){ 
                   $y=$y+1;    
                     ?>
                  
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3" name="<?php echo $y+$prviDanuMesecuWeekday-1; ?>" 
                   id="<?php echo $y+$prviDanuMesecuWeekday-1; ?>" 
                   ><?php 
                       
                      echo $y; 
                      
                   
                   ?></textarea>
            
             <?php }
             
             $z=$prviDanuMesecuWeekday+$d;
            while($z < 43){ 
                   $z=$z+1;    
                     ?>
                  
                   <textarea style="width:13.9%; height:7em; visibility:hidden;"   col="3" row="3" name="<?php echo $z-1; ?>" 
                   id="<?php echo $z-1; ?>" 
                   ><?php 
                       
                      echo "0";
                       
                   
                   ?></textarea>
             
             
              <?php }?>



            </div>
                             <button hidden type="submit"  name="numberdanD1php1" id="numberdanD1php3">Generisi broj datuma iz prvog reda</button>
                         
                             
                    </div>
           

            </form>

        <?php
        // kraj 1. i pocetak 2. forme
        }    else

           


        {

                 $mysqli = new mysqli("sql300.epizy.com", "epiz_30944424", "bvYl5uccfJfJ1CI", "epiz_30944424_mydb") 
                                        or die(mysqli_error($mysqli));
              
              $k1=$_POST['1'];
                    $k2=$_POST['2'];
                    $k3=$_POST['3'];
                    $k4=$_POST['4'];
                    $k5=$_POST['5'];
                    $k6=$_POST['6'];
                    $k7=$_POST['7'];
                    $k8=$_POST['8'];
                    $k9=$_POST['9'];
                    $k10=$_POST['10'];
                    $k11=$_POST['11'];
                    $k12=$_POST['12'];
                    $k13=$_POST['13'];
                    $k14=$_POST['14'];
                    $k15=$_POST['15'];
                    $k16=$_POST['16'];
                    $k17=$_POST['17'];
                    $k18=$_POST['18'];
                    $k19=$_POST['19'];
                    $k20=$_POST['20'];
                    $k21=$_POST['21'];
                    $k22=$_POST['22'];
                    $k23=$_POST['23'];
                    $k24=$_POST['24'];
                    $k25=$_POST['25'];
                    $k26=$_POST['26'];
                    $k27=$_POST['27'];
                    $k28=$_POST['28'];
                    $k29=$_POST['29'];
                    $k30=$_POST['30'];
                    $k31=$_POST['31'];
                    $k32=$_POST['32'];
                    $k33=$_POST['33'];
                    $k34=$_POST['34'];
                    $k35=$_POST['35'];
                    $k36=$_POST['36'];
                    $k37=$_POST['37'];
                    $k38=$_POST['38'];
                    $k39=$_POST['39'];
                    $k40=$_POST['40'];
                    $k41=$_POST['41'];
                    $k42=$_POST['42'];
                    $idMesecBaza=$_POST['idMesecBaza'];
                    $godinaBaza=$_POST['godinaBaza'];
           
               $mysqli = new mysqli("sql300.epizy.com", "epiz_30944424", "bvYl5uccfJfJ1CI", "epiz_30944424_mydb") 
                                        or die(mysqli_error($mysqli));
            ?>
            
            <div >

           <form>
                    <div class="row">
                     <div class="col-5">
                                <label for="mesec">Mesec:</label>
                            </div>
                            <div class="col-20">
                            
                            
                            <select name="idMesecBaza" id="mesecPromenaBaza" onchange="myFunctionMesPromBaza()">
                            <option  value="<?php 
                             $time_input = strtotime("$k8"); 
                                $imeMesec = getDate($time_input); 
                                 
                                echo $imeMesec[mon];
                            ?>" >
                            <?php 
                                $time_input = strtotime("$k8"); 
                                $imeMesec = getDate($time_input); 
                                 switch ($imeMesec[mon]) {
                                    case "1":
                                        $imeMesec="Januar";
                                    break;
                                    case "2":
                                        $imeMesec="Februar";
                                    break;
                                    case "3":
                                        $imeMesec="Mart";
                                    break;
                                    case "4":
                                        $imeMesec="April";
                                    break;
                                    case "5":
                                        $imeMesec="Maj";
                                    break;
                                    case "6":
                                        $imeMesec="Jun";
                                    break;
                                    case "7":
                                        $imeMesec="Jul";
                                    break;
                                    case "8":
                                        $imeMesec="Avgust";
                                    break;
                                    case "9":
                                        $imeMesec="Septembar";
                                    break;
                                    case "10":
                                        $imeMesec="Oktobar";
                                    break;
                                    case "11":
                                        $imeMesec="Novembar";
                                    break;
                                    case "12":
                                        $imeMesec="Decembar";
                                    break;
                                    default:
                                        echo "!";
                                    }  
                                
                                echo $imeMesec;
                    
                            ?>
                            </option>
                            
                            <?php 
                            $resultMesec= $mysqli->query("SELECT * FROM mesec  ")
                                or die($mysqli->error);
                            while($rowMesec = mysqli_fetch_array($resultMesec)):;?>
                            <option  value="<?php echo $rowMesec[0];?>"><?php echo $rowMesec[0]." ".$rowMesec[1];?></option>
                            <?php endwhile;?>
                            </select>

                            </div>
                           
                            <div class="col-5">
                                    <label for="godina">Godina:</label>
                            </div>

                            <div class="col-20">
                               


                            <select name="godinaBaza" id="godinaPromenaBaza" onchange="myFunctionGodPromBaza()">
                            <option value="<?php 
                            $time_input = strtotime("$k8"); 
                            $godinaBaza = getDate($time_input);
                            echo $godinaBaza[year];
                            
                            ?>" ><?php 
                            $time_input = strtotime("$k8"); 
                            $godinaBaza = getDate($time_input);
                            echo $godinaBaza[year];
                            
                            ?>
                            
                            </option>
                            
                            <?php 
                            $g=-5;
                            while($g <6 ):;
                            $g=$g+1;?>
                            
                            <option  value="<?php echo date('Y')+ $g;?>"><?php echo date('Y')+ $g;?></option>
                            <?php  endwhile;?>
                            </select>


                            </div>
                            <div hidden class="col-20">
                                 <input  type="text" name="datumPrviuMesecuBaza" id="datumPrviuMesecuBaza" value="<?php ?>">
                            </div>
                            <div hidden class="col-20">
                                 <input  type="text" name="prviDanuMesecuDatumBaza" id="prviDanuMesecuDatumBaza" value="<?php ?>">
                            </div>
                            <div hidden class="col-20">
                                 <input  type="text" name="daysInMonthBaza" id="daysInMonthBaza" value="<?php ?>">
                            </div>
                        </div>
                    </form>
                           
            <div>
            <table>
                <thead>
            <th style="width:14%"> Ponedeljak</th>
            <th style="width:14%"> Utorak</th>
            <th style="width:14%"> Sreda</th>
            <th style="width:14%"> Cetvrtak</th>
            <th style="width:14%"> Petak</th>
            <th style="width:14%"> Subota</th>
            <th style="width:14%"> Nedelja</th>
            
               </thead>
            </table>
        
<form method="post">
       
        <?php

                

               /*
                $x=0; 
                
                $prviDanuMesecuSec=date_create();
                date_date_set($prviDanuMesecuSec,date('Y'),date('m'),1);
                               
                $prviDanuMesecuWeekday=$prviDanuMesecuSec->format('N');
                 $d=cal_days_in_month(CAL_GREGORIAN,$prviDanuMesecuSec->format('m'),$prviDanuMesecuSec->format('Y'));
                
               while($x < $prviDanuMesecuWeekday-1){ 
                   $x=$x+1;  
                   */   
                      
                     switch ($k1) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="1" id="101"
                                    ><?php  
                                    echo $k1;
            
                                    ?></textarea> 
                                    <?php }
                                    break;

                                    

                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="1" id="101"
                                    ><?php 
                                            $date = strtotime($k1);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                              if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}

                        switch ($k2) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="2" id="102"
                                    ><?php  
                                    echo $k2;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "    name="2" id="102"><?php 
                                            $date = strtotime($k2);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                            
                                        </textarea> 
                                    <?php
                                    break;}}

                         switch ($k3) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="33"  name="3" id="103"
                                    ><?php echo $k3;?>
                                    </textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="3" id="103"
                                    ><?php 
                                            $date = strtotime($k3);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                            

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}

                        switch ($k4) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="4" id="104"
                                    ><?php  
                                    echo $k4;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="4" id="104"
                                    ><?php 
                                            $date = strtotime($k4);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}

                         switch ($k5) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="5" id="105"
                                    ><?php  
                                    echo $k5;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="5" id="105"
                                    ><?php 
                                            $date = strtotime($k5);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}

                        switch ($k6) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="6" id="106"
                                    ><?php  
                                    echo $k6;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="6" id="106"
                                    ><?php 
                                            $date = strtotime($k6);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                        </textarea> 
                                    <?php
                                    break;}}?>
                  
                  
                  
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="7" id="107"
                   ><?php 
                                            $date = strtotime($k7);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                            </textarea>
                    <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="8" id="108"
                   ><?php 
                                            $date = strtotime($k8);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                        </textarea>
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="9" id="109"
                   ><?php 
                                            $date = strtotime($k9);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                    </textarea>
                    <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="10" id="110"
                   ><?php 
                                            $date = strtotime($k10);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                        </textarea>
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="11" id="111"
                   ><?php 
                                            $date = strtotime($k11);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                        </textarea>
                    <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="12" id="112"
                   ><?php 
                                            $date = strtotime($k12);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                        </textarea>
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="13" id="113"
                   ><?php 
                                            $date = strtotime($k13);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                        </textarea>
                    <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="14" id="114"
                   ><?php 
                                            $date = strtotime($k14);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                    </textarea>
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="15" id="115"
                   ><?php 
                                            $date = strtotime($k15);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                        </textarea>
                    <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="16" id="116"
                   ><?php 
                                            $date = strtotime($k16);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                        </textarea>
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="17" id="117"
                   ><?php 
                                            $date = strtotime($k17);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                        </textarea>
                    <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="18" id="118"
                   ><?php 
                                            $date = strtotime($k18);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                        </textarea>
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="19" id="119"
                   ><?php 
                                            $date = strtotime($k19);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                        </textarea>
                    <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="20" id="120"
                   ><?php 
                                            $date = strtotime($k20);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-".["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                </textarea>
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="21" id="121"
                   ><?php 
                                            $date = strtotime($k21);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                </textarea>
                    <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="22" id="122"
                   ><?php 
                                            $date = strtotime($k22);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                        </textarea>
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="23" id="123"
                   ><?php 
                                            $date = strtotime($k23);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                            </textarea>
                    <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="24" id="124"
                   ><?php 
                                            $date = strtotime($k24);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                            </textarea>
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="25" id="125"
                   ><?php 
                                            $date = strtotime($k25);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea>
                    <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="26" id="126"
                   ><?php 
                                            $date = strtotime($k26);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                </textarea>
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="27" id="127"
                   ><?php 
                                            $date = strtotime($k27);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                </textarea>
                    <textarea style="width:13.9%; height:7em;"  col="3" row="3"  name="28" id="128"
                   ><?php 
                                            $date = strtotime($k28);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                </textarea>
                   
                   
            
                    <?php
                     switch ($k29) {
                                    case "0" :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="29" id="129"
                                    ><?php  
                                    echo $k29;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="29" id="129"
                                    ><?php 
                                            $date = strtotime($k29);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}
                     switch ($k30) {
                                    case "0" :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="30" id="130"
                                    ><?php  
                                    echo $k30;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="30" id="130"
                                    ><?php 
                                            $date = strtotime($k30);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}
                    switch ($k31) {
                                    case "0" :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="31" id="131"
                                    ><?php  
                                    echo $k31;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="31" id="131"
                                    ><?php 
                                            $date = strtotime($k31);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}

                    switch ($k32) {
                                    case "0" :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="32" id="132"
                                    ><?php  
                                    echo $k32;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="32" id="132"
                                    ><?php 
                                            $date = strtotime($k32);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}
                    switch ($k33) {
                                    case "0" :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="33" id="133"
                                    ><?php  
                                    echo $k33;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="33" id="133"
                                    ><?php 
                                            $date = strtotime($k33);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}
                    switch ($k34) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="34" id="134"
                                    ><?php  
                                    echo $k34;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="34" id="134"
                                    ><?php 
                                            $date = strtotime($k34);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                        </textarea> 
                                    <?php
                                    break;}}

                    switch ($k35) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="35" id="135"
                                    ><?php  
                                    echo $k35;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="35" id="135"
                                    ><?php 
                                            $date = strtotime($k35);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                        </textarea> 
                                    <?php
                                    break;}}
                    
                    switch ($k36) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="36" id="136"
                                    ><?php  
                                    echo $k36;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="36" id="136"
                                    ><?php 
                                            $date = strtotime($k36);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}
                    
                    switch ($k37) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="37" id="137"
                                    ><?php  
                                    echo $k37;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="37" id="137"
                                    ><?php 
                                            $date = strtotime($k37);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                        </textarea> 
                                    <?php
                                    break;}}

                    switch ($k38) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="38" id="138"
                                    ><?php  
                                    echo $k38;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="38" id="138"
                                    ><?php 
                                            $date = strtotime($k38);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                        </textarea> 
                                    <?php
                                    break;}}
                    switch ($k39) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="39" id="139"
                                    ><?php  
                                    echo $k39;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="39" id="139"
                                    ><?php 
                                            $date = strtotime($k39);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                        </textarea> 
                                    <?php
                                    break;}}
                    switch ($k40) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="40" id="140"
                                    ><?php  
                                    echo $k40;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="40" id="140"
                                    ><?php 
                                            $date = strtotime($k40);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}
                    switch ($k41) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="41" id="141"
                                    ><?php  
                                    echo $k41;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="41" id="141"
                                    ><?php 
                                            $date = strtotime($k41);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}

                    switch ($k42) {
                                    case "0":
                                        {?>
                                    <textarea style="width:13.9%; height:7em; visibility:hidden;"  col="3" row="3"  name="42" id="142"
                                    ><?php  
                                    echo $k42;
            
                                    ?></textarea> 
                                    <?php }
                                    break;
                                    default :
                                        {?>
                                    <textarea style="width:13.9%; height:7em; "  col="3" row="3"  name="42" id="142"
                                    ><?php 
                                            $date = strtotime($k42);
                                            $date1 = strtotime("-1 days", $date);
                                            $date2 = strtotime("+1 days", $date);
                                            $date_print = getDate($date); 
                                              echo $date_print[mday].'. ';
                                           

                                            $date1datum = new DateTime("@$date1");
                                            $date1datum2= $date1datum->format('Y-m-d H:i:s');
                                            $date2datum = new DateTime("@$date2");
                                            $date2datum2= $date2datum->format('Y-m-d H:i:s');
                                     
                                            $result= $mysqli->query("SELECT * FROM spia_join where DatumKreiranjaAkta between '$date1datum2'
                                             and '$date2datum2'") or die($mysqli->error);
                                             if ($row = $result->fetch_assoc()){
                                              echo "DatumKreiranjaAkta:";}
                                            while($row = $result->fetch_assoc()){ ?>
                                                
                                                 <?php echo $row["DatumKreiranjaAkta"]."-";?>
                                                 <?php echo $row["NazivAkta"]." | ";?>
                                                 <?php
                                               }?>
                                    </textarea> 
                                    <?php
                                    break;}}

                   
                       
                   
             /*}
            $y=0;
            while($y < $d){ 
                   $y=$y+1;    
                     ?>
                  
                   <textarea style="width:13.9%; height:7em;"  col="3" row="3" name="<?php echo $y+$prviDanuMesecuWeekday-1; ?>" 
                   id="<?php echo $y+$prviDanuMesecuWeekday-1; ?>" 
                   ><?php 
                       
                      echo $y."1111"; 
                      
                      
                   
                   ?></textarea>
            
             <?php }
             
             $z=$prviDanuMesecuWeekday+$d;
            while($z < 43){ 
                   $z=$z+1;    
                     ?>
                  
                   <textarea hidden   col="3" row="3" name="<?php echo $z-1; ?>" 
                   id="<?php echo $z-1; ?>" 
                   ><?php 
                       
                      echo "0";
                       
                   
                   ?></textarea>
             
             
              <?php }

        */
        }?>
<button  hidden type="submit"  name="kalendarBaza" id="kalendarBaza">Generisi </button>
</form>
 <?php include 'inlude/script.php';?>

</body>
</html>