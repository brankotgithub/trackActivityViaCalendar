<?php

require('tcpdf/tcpdf_min/tcpdf.php');

if (isset ($_POST['pdf'])){
     
     

   $obj_pdf= new TCPDF('P',PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   $obj_pdf->SetCreator(PDF_CREATOR);
   $obj_pdf->SetTitle(pdf_table);
   $obj_pdf->SetHeaderDate("", "", PDF_HEADER_TITLE, PDF_HEADER_STRING);
   $obj_pdf->SetHeaderFont(array(PDF_FONT_NAME_MAIN, "", PDF_FONT_SIZE_MAIN));
   $obj_pdf->SetFooterFont(array(PDF_FONT_NAME_MAIN, "", PDF_FONT_SIZE_MAIN));
   $obj_pdf->SetDefaultMonospacedFont('helvetica');
   $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
        $obj_pdf->SetPrintHeader(false);
        $obj_pdf->SetPrintFooter(false);
        $obj_pdf->SetAutoPageBreak(true, 10);
        $obj_pdf->SetFont('helvetica', '', '12');
        $obj_pdf->AddPage();

    $content='';

    $content .='
     <table>
                
                <tr >     
                     <th >RBR</th>
                    <th >NazivAkta</th> 
                    <th >Izradjivac</th> 
                    <th >Datum-vrsta promene</th> 
                    
                    <th >NazivProjekta</th> 
                    <th >NazivSubjekta</th>    
                </tr>
                
            </table>
    
    ';

    $obj_pdf->WriteHTML($content);
    $obj_pdf->Output("sample.pdf");

}
?>

<!DOCTYPE html>

<html>
    <head>
     

    </head>
    
 <body>
    
    <table>
                
                <tr >     
                     <th >RBR</th>
                    <th >NazivAkta</th> 
                    <th >Izradjivac</th> 
                    <th >Datum-vrsta promene</th> 
                    
                    <th >NazivProjekta</th> 
                    <th >NazivSubjekta</th>    
                </tr>
                
            </table>
        
<form method="post">
<button  type="submit"  name="pdf" >PDF</button>
</form>

            
            

    
    </body>
</html>