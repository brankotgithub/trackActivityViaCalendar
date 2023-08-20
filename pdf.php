<?php

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
      <h4 align="center">Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</h4><br /> 
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
           <title>SoftAOX | Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br />
           <div class="container">  
                <h4 align="center"> Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</h4><br />  
                <div class="table-responsive">  
                    <div class="col-md-12" align="right">
                     <form method="post">  
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">RBR</th>
                    <th width="20%">NazivAkta</th> 
                    <th width="20%">Izradjivac</th> 
                    <th width="20%">Datum-vrsta promene</th> 
                    
                    <th width="20%">NazivProjekta</th> 
                    <th width="15%">NazivSubjekta</th>  
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
</html>