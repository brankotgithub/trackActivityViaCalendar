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
  <?php include 'inlude/dropdown2.php';?>

<?php
date_default_timezone_set("Europe/Belgrade");

?>
        
        
        <b >PREGLED AKTIVNOSTI PO AKTIMA</b>
        
  <?php require_once 'proces_val_tables.php';?>
        <?php
        $mysqli = new mysqli("sql300.epizy.com", "epiz_30944424", "bvYl5uccfJfJ1CI", "epiz_30944424_mydb") 
        or die(mysqli_error($mysqli));
        include 'inlude/create_arhiva_akta.php'; 
        $result= $mysqli->query("SELECT * FROM arhiva_akta ORDER BY `arhiva_akta`.`datumPromene` DESC;" )
                or die($mysqli->error);

         $resultAkta= $mysqli->query("SELECT * FROM akta ORDER BY `akta`.`idAkta` DESC")
                or die($mysqli->error);

  
 
?>
  
  <div>
            <table>
                <thead>
             <th style="width:5%"><i class="fa fa-filter" style="font-size:24px;color:white;"></i></th>
            <th class="thwidthArhivaAkta"><input type="text" id="myInput" onkeyup="myFunction()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th class="thwidthArhivaAkta"><input type="text" id="myInput1" onkeyup="myFunction2()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
              <th class="thwidthArhivaAkta"><input type="text" id="myInput2" onkeyup="myFunction3()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th class="thwidthArhivaAkta"><input type="text" id="myInput3" onkeyup="myFunction4()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th> 
            <th ><input type="text" id="myInput4" onkeyup="myFunction5()" 
                class="pretrazi" title="Pretrazi kolonu" style="font-family: FontAwesome;" placeholder='&#xf002 Pretrazi...'></th>
               </thead>
            </table>

               <table>
                <thead>
                <tr >     
                     <th rowspan="3" style="width:5%">RBR</th>
                    <th class="thwidthArhivaAkta">NazivAkta</th> 
                    <th class="thwidthArhivaAkta">Izradjivac</th> 
                    <th class="thwidthArhivaAkta">Datum-vrsta promene</th> 
                    
                    <th class="thwidthArhivaAkta">NazivProjekta</th> 
                    <th class="thwidthArhivaAkta">NazivSubjekta</th>    
                </tr>
                </thead>
            </table>
            
             <div class="plutanje"> 
                           
        <table   id="myTable"> 
               <?php 
               $x=0; 

              

               while($row = $result->fetch_assoc()){ 
                   $x=$x+1;
                  
             

$start_date = $row["datumPromene"];  
$date = strtotime($start_date);
$date = strtotime("+21800 seconds", $date);


            

 

            switch ($row["vrstaPromene"]) {
                case "1":
                    $vrstaPromene="Kreiran";
                break;
                case "2":
                    $vrstaPromene="Promenjen";
                break;
                case "3":
                    $vrstaPromene="Arhiviran";
                break;
                default:
                    echo "!";
                }
           
                   ?>
                
                <tr>	
                     <td style="width:5%"><?php echo $x.". ";?></td>
                    <td class="thwidthArhivaAkta"><?php echo $row["NazivAkta"].". ".$row["usernameSesion"];?></td>
                    <td class="thwidthArhivaAkta"><?php echo $row["firstname"]." ".$row["lastname"];?></td>
                    <td class="thwidthArhivaAkta"><?php echo date('d.m.Y H:i:s', $date)
                    ." - ".$vrstaPromene;?></td>
                    
                    <td class="thwidthArhivaAkta"><?php echo $row["NazivProjekta"];?></td>
                    <td class="thwidthArhivaAkta"><?php echo $row["NazivSubjekta"];?></td>
                    
                </tr>
              <?php }   
                ?>
            
            </table>        
           </div >
                <table>
                    <tr>
                        
            
                        
                        <th><?php echo "Broj zapisa:" . $x;?></th>
                    </tr>
                </table>
        

            
            

    
    </body>
</html>