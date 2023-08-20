<!DOCTYPE html>

<html>
    <head>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></sript>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Tables</title>
        <style>
            table, th, td, input {
                border: 1px solid black;
            }
            table {
                width: 100%;
            }
            th {
            background-color: #04AA6D;
            color: white;
            font-size: 18px;
            }
            
            .center {
                margin: auto;
                width: 60%;
                border: 3px solid #73AD21;
                padding: 10px;
                }
            .pretrazi {
                margin: auto;
                width: 100%;
                border: 3px solid #73AD21;
                color: blue;
                font-size:25px;
                padding: 10px;
                }
            .plutanje {
                max-height: 310px;
                min-height: 230px;
                overflow: auto;
                }
            .thwidth {
                width: 35%;
                }
            .thwidth1 {
                width: 35%;
                }
      *  {
  box-sizing: border-box;
} // kutije budu jedna u drugoj

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

input[type=text], select {
  width: 100%;
  padding: 2px 20px;
  margin: 4px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  color: blue;
  font-size:20px;
}
.formdiv {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  border: 3px solid #73AD21;
}
.divsesion {
  color:red;
  border: 3px solid blue;
  width: 50%;
  text-align: center;   
}

</style>

    </head>
    
    <body class="center">
 <div class="center">
<?php include 'inlude/menu.php';?>
</div>
        <?php require_once 'htdocs/subjekat/proces_val_tables1.php';?>


         <?php
        $mysqli = new mysqli("sql300.epizy.com","epiz_30944424", "bvYl5uccfJfJ1CI","mydb") 
        or die(mysqli_error($mysqli));
          
        $result= $mysqli->query("SELECT * FROM subjekat ORDER BY `subjekat`.`idSubjekat` DESC")
                or die($mysqli->error);
        ?>   

        <div>
            <table>
                <thead>
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
                    <th class="thwidth">Ime</th> 
                    <th class="thwidth">Prezime</th> 
                    <th >Izmeni-Obrisi</th>   
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
                    <td class="thwidth1"><?php echo $x.". ".$row["NazivSubjekta"];?></td>
                    <td class="thwidth1"><?php echo $row["PrezimeVlasnika"];?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['idSubjekat'];?>"
                           >Izmeni</a>
                        <a href="proces_val_tables1.php?delete=<?php echo $row['idSubjekat'];?>"
                           >Obrisi</a>
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
             
        <form action="proces_val_tables1.php"  method="post">
            <input type="hidden" name="idSubjekat" value="<?php echo $idSubjekat?>" 
            <label>Unesite ime i prezime:</label>
             <input type="text" name="NazivSubjekta" autofocus value="<?php echo $NazivSubjekta?>" 
                    placeholder="Unesi ime" title="Obavezno polje!" 
                    onclick="document.getElementById('demo').style.display = 'none'"><br>
           
            <input type="text" name="PrezimeVlasnika" value="<?php echo $PrezimeVlasnika?>" 
                   placeholder="Unesi prezime">
            </div >
            <div>
                <table>
                    <tr>
                        <th colspan="2">
            <?php
            if ($update==true) {?>
                <button  type="submit" name="update" >Prihvati izmene</button>
            <?php }else{?>
                <button  type="submit"  name="save" >Sacuvaj</button>
                
           <?php }?>
                        </th>
                        <th><?php echo "Broj zapisa:" . $x;?></th>
                    </tr>
                </table>

                
            </div> 
        </form>
            <?php include 'inlude/foother,php';?>  
 <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}  

function myFunction1(){
    //document.getElementsByClassName("divsesion").style.display = "none";
    document.getElementById("demo").innerHTML = "New text!";

}
</script> 
<script> 
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}  
</script> 

</body>
</html>