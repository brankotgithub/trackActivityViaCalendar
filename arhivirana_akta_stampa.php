<?php 
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;}

function fetch_data()  

{  
      $output = '';  
      $mysqli = new mysqli("sql300.epizy.com", "epiz_30944424", "bvYl5uccfJfJ1CI", "epiz_30944424_mydb") 
        or die(mysqli_error($mysqli));

        include 'inlude/create_arhiva_akta.php'; 

        $result= $mysqli->query("SELECT * FROM arhiva_akta WHERE vrstaPromene='3' ORDER BY `arhiva_akta`.`datumPromene` DESC ;" )
                or die($mysqli->error);

         $resultAkta= $mysqli->query("SELECT * FROM akta ORDER BY `akta`.`idAkta` DESC")
                or die($mysqli->error);
                
        $x=0; 
      while($row = mysqli_fetch_array($result))  
      
      { 
          $x=$x+1;     
          $start_date = $row["datumPromene"];  
$date = strtotime($start_date);
$date = strtotime("+21800 seconds", $date); 
      $output .= '<tr >     
                     <th >'.$x.'</th>
                    <th >'.$row["NazivAkta"].'</th> 
                    <th >'.$row["firstname"]." ".$row["lastname"].'</th> 
                    <th >'.date('d.m.Y H:i:s', $date).'</th> 
                    
                    <th >'.$row["NazivProjekta"].'</th> 
                    <th >'.$row["NazivSubjekta"].'</th>    

                   
                </tr> 
                          ';  
      }  
      return $output; 

}  
 if(isset($_POST["generate_pdf"]))  
 {  


require('tcpdf/tcpdf_min/tcpdf.php');

     
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">PREGLED ARHIVIRANIH AKATA</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="5%">RBR</th>
                    <th width="20%">NazivAkta</th> 
                    <th width="20%">Izradjivac</th> 
                    <th width="20%">Datum-vrsta promene</th> 
                    
                    <th width="20%">NazivProjekta</th> 
                    <th width="15%">NazivSubjekta</th>
                
                 
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
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
        
       <form target="blank" method="post">  
                          <input   style="background:red; color:white;" type="submit" name="generate_pdf" class="btn btn-success" value="Generisi PDF" />  
                          <b >PREGLED ARHIVIRANIH AKATA</b>
                     </form>
        
        
  <?php require_once 'proces_val_tables.php';?>
        <?php
        $mysqli = new mysqli("sql300.epizy.com", "epiz_30944424", "bvYl5uccfJfJ1CI", "epiz_30944424_mydb") 
        or die(mysqli_error($mysqli));

        include 'inlude/create_arhiva_akta.php'; 

        $result= $mysqli->query("SELECT * FROM arhiva_akta WHERE vrstaPromene='3' ORDER BY `arhiva_akta`.`datumPromene` DESC ;" )
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