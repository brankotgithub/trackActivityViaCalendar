<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
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
    td = tr[i].getElementsByTagName("td")[2];
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

<script> 
function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
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

<script> 
function myFunction4() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
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

<script> 
function myFunction5() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput4");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
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

<script>
function myFunctionTopNav() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<script>
//skripta proba za unos vrednosti po promeni vrednosti polja u formi u stranici kalendar
document.getElementById("mesecPromena").addEventListener("change", myFunctionMesProm);
document.getElementById("godinaPromena").addEventListener("change", myFunctionGodProm);
document.getElementById("mesecPromenaBaza").addEventListener("change", myFunctionMesPromBaza);
document.getElementById("godinaPromenaBaza").addEventListener("change", myFunctionGodProm);


function myFunctionSetDatum (){
    
var  trenutnidatum = new Date();
 var month = trenutnidatum.getMonth()+1;
 var year = trenutnidatum.getFullYear();
 

 document.getElementById("mesecPromena2").value = month;
 document.getElementById("godinaPromena2").value = year;
 
prviDanuMesecuDatum = new Date(year, month-1, 1);
 document.getElementById("danPromenaD").value = prviDanuMesecuDatum.getDay();

    let trenutniweekdayNumber = prviDanuMesecuDatum.getDay();
    daysInMonth = new Date(year, month, 0).getDate();
    
    var xx=0;
   
    var ii=0;
    while (ii < daysInMonth) {
        
        document.getElementById(trenutniweekdayNumber+xx).value = xx+1;
        
        ii++;
        xx++;
    }
}


function myFunctionMesPromBaza() {
  
    
var xxxxb=101;
    var iiiib=1;

    while (iiiib < 7) {
    document.getElementById(xxxxb).style.visibility = 'visible';
    document.getElementById(xxxxb).value = 0;
    iiiib++;
        xxxxb++;
        }
    var xxxxb=142;
    var iiiib=1;
while (iiiib < 14) {
    document.getElementById(xxxxb).style.visibility = 'visible';
    document.getElementById(xxxxb).value = 0;
    iiiib++;
        xxxxb--;
        }
    
    var xb = document.getElementById("mesecPromenaBaza");
    var yb = document.getElementById("godinaPromenaBaza");
    let dan1b = "1";
    let textb = "/";
    var dateStringBazaM = document.getElementById("datumPrviuMesecuBaza").value = new Date(yb.value.concat(textb).concat(xb.value).concat(textb).concat(dan1b));
    prviDanuMesecuDatumBaza = dateStringBazaM.getDay();
    daysInMonthBaza = new Date(yb.value, xb.value, 0).getDate();
    document.getElementById("prviDanuMesecuDatumBaza").value =prviDanuMesecuDatumBaza;
    document.getElementById("daysInMonthBaza").value =daysInMonthBaza;

    iiib=0;
    xxxb=0;
    
    const dateStrzaKalendarBaza = yb.value.concat(textb).concat(xb.value).concat(textb);
    while (iiib < daysInMonthBaza) {

         let datumBaza = (dateStrzaKalendarBaza).concat(xxxb+1);
         

        switch(prviDanuMesecuDatumBaza) {
            case 0:
                document.getElementById(107+xxxb).value = datumBaza;
            break;
            
            
            default:
            document.getElementById(prviDanuMesecuDatumBaza+xxxb+100).value = datumBaza;
            }
            
        iiib++;
        xxxb++;
        
        }

         switch(prviDanuMesecuDatumBaza) {
            case 0:{
                var zzzb=1;
                while (zzzb < 7) {
                    document.getElementById(zzzb+100).style.visibility = 'hidden';
                    zzzb++;
                    }
                    let preostaliDanidoKrajaMesecaBaza=107+daysInMonthBaza;
                while (preostaliDanidoKrajaMesecaBaza < 143) {
                     document.getElementById(preostaliDanidoKrajaMesecaBaza).style.visibility = 'hidden';
                     document.getElementById(preostaliDanidoKrajaMesecaBaza).value = 0;
                        preostaliDanidoKrajaMesecaBaza++;
                   


                }
                }
            break;
            
            default:{
            var zzzb=1;
                while (zzzb < prviDanuMesecuDatumBaza) {
                    document.getElementById(zzzb+100).style.visibility = 'hidden';
                    zzzb++;
                    }
                     let preostaliDanidoKrajaMesecaBaza=zzzb+daysInMonthBaza+100;
                while (preostaliDanidoKrajaMesecaBaza < 143) {
                     document.getElementById(preostaliDanidoKrajaMesecaBaza).style.visibility = 'hidden';
                     document.getElementById(preostaliDanidoKrajaMesecaBaza).value = 0;
                        preostaliDanidoKrajaMesecaBaza++;
                   


                }
               }
            }
 document.getElementById("kalendarBaza").click();

}
    


function myFunctionGodPromBaza() {
  
    
var xxxxb=101;
    var iiiib=1;

    while (iiiib < 7) {
    document.getElementById(xxxxb).style.visibility = 'visible';
    document.getElementById(xxxxb).value = 0;
    iiiib++;
        xxxxb++;
        }
    var xxxxb=142;
    var iiiib=1;
while (iiiib < 14) {
    document.getElementById(xxxxb).style.visibility = 'visible';
    document.getElementById(xxxxb).value = 0;
    iiiib++;
        xxxxb--;
        }
    
    var xb = document.getElementById("mesecPromenaBaza");
    var yb = document.getElementById("godinaPromenaBaza");
    let dan1b = "1";
    let textb = "/";
    var dateStringBazaM = document.getElementById("datumPrviuMesecuBaza").value = new Date(yb.value.concat(textb).concat(xb.value).concat(textb).concat(dan1b));
    prviDanuMesecuDatumBaza = dateStringBazaM.getDay();
    daysInMonthBaza = new Date(yb.value, xb.value, 0).getDate();
    document.getElementById("prviDanuMesecuDatumBaza").value =prviDanuMesecuDatumBaza;
    document.getElementById("daysInMonthBaza").value =daysInMonthBaza;

    iiib=0;
    xxxb=0;
    
    const dateStrzaKalendarBaza = yb.value.concat(textb).concat(xb.value).concat(textb);
    while (iiib < daysInMonthBaza) {

         let datumBaza = (dateStrzaKalendarBaza).concat(xxxb+1);
         

        switch(prviDanuMesecuDatumBaza) {
            case 0:
                document.getElementById(107+xxxb).value = datumBaza;
            break;
            
            
            default:
            document.getElementById(prviDanuMesecuDatumBaza+xxxb+100).value = datumBaza;
            }
            
        iiib++;
        xxxb++;
        
        }

         switch(prviDanuMesecuDatumBaza) {
            case 0:{
                var zzzb=1;
                while (zzzb < 7) {
                    document.getElementById(zzzb+100).style.visibility = 'hidden';
                    zzzb++;
                    }
                    let preostaliDanidoKrajaMesecaBaza=107+daysInMonthBaza;
                while (preostaliDanidoKrajaMesecaBaza < 143) {
                     document.getElementById(preostaliDanidoKrajaMesecaBaza).style.visibility = 'hidden';
                     document.getElementById(preostaliDanidoKrajaMesecaBaza).value = 0;
                        preostaliDanidoKrajaMesecaBaza++;
                   


                }
                }
            break;
            
            default:{
            var zzzb=1;
                while (zzzb < prviDanuMesecuDatumBaza) {
                    document.getElementById(zzzb+100).style.visibility = 'hidden';
                    zzzb++;
                    }
                     let preostaliDanidoKrajaMesecaBaza=zzzb+daysInMonthBaza+100;
                while (preostaliDanidoKrajaMesecaBaza < 143) {
                     document.getElementById(preostaliDanidoKrajaMesecaBaza).style.visibility = 'hidden';
                     document.getElementById(preostaliDanidoKrajaMesecaBaza).value = 0;
                        preostaliDanidoKrajaMesecaBaza++;
                   


                }
               }
            }
document.getElementById("kalendarBaza").click();

}


function myFunctionMesProm() {
    

var xxxx=1;
    var iiii=1;

    while (iiii < 42) {
    document.getElementById(xxxx).style.visibility = 'visible';
     document.getElementById(xxxx).value=0;
    iiii++;
        xxxx++;
        }

  var x = document.getElementById("mesecPromena");
  var y = document.getElementById("godinaPromena2");
  var z = document.getElementById("danDD");

  
    
    let dan1 = "1";
    let text = "/";
     let text1 = "-";
     let text2 = "=";
     let text3 = "'";
     
    
    document.getElementById("mesecPromena2").value = x.value;
    document.getElementById("danPromena1").value = y.value.concat(text).concat(x.value).concat(text).concat(dan1);

   const dateStr = y.value.concat(text).concat(x.value).concat(text).concat(dan1);
   var dateStr1 = new Date(dateStr);
    document.getElementById("danPromenaD").value =  dateStr1;

    const dateStr2 = y.value.concat(text1).concat(x.value).concat(text1).concat(z.value);
     var dateStr3 = new Date(dateStr2);
    document.getElementById("danPromenaDD").value =  dateStr3;

   prviDanuMesecuDatum = dateStr1.getDay();
 
   
    let promenaweekdayNumber = prviDanuMesecuDatum;
 var month1 = dateStr3.getMonth()+1;
 var year1 = dateStr3.getFullYear();

    
    daysInMonth1 = new Date(year1, month1, 0).getDate();
    var xxx=0;
    var iii=0;
    const dateStrzaKalendar = y.value.concat(text).concat(x.value).concat(text);
    
    document.getElementById("numberdanD1php2").value=daysInMonth1;

    while (iii < daysInMonth1) {
        
        
        let datum = (dateStrzaKalendar).concat(xxx+1);
         

        switch(promenaweekdayNumber) {
            case 0:
                document.getElementById(7+xxx).value = datum;
            break;
            
            
            default:
            document.getElementById(promenaweekdayNumber+xxx).value = datum;
            }


        iii++;
        xxx++;
        }

        switch(promenaweekdayNumber) {
            case 0:{
                var zzz=1;
                while (zzz < 7) {
                    document.getElementById(zzz).style.visibility = 'hidden';
                    zzz++;
                    }
                    let preostaliDanidoKrajaMeseca=7+daysInMonth1;
                while (preostaliDanidoKrajaMeseca < 43) {
                     document.getElementById(preostaliDanidoKrajaMeseca).style.visibility = 'hidden';
                        preostaliDanidoKrajaMeseca++;
                   


                }
                }
            break;
            
            default:{
            var zzz=1;
                while (zzz < promenaweekdayNumber) {
                    document.getElementById(zzz).style.visibility = 'hidden';
                    zzz++;
                    }
                     let preostaliDanidoKrajaMeseca=zzz+daysInMonth1;
                while (preostaliDanidoKrajaMeseca < 43) {
                     document.getElementById(preostaliDanidoKrajaMeseca).style.visibility = 'hidden';
                        preostaliDanidoKrajaMeseca++;
                   


                }
               }
            }
    
                document.getElementById("numberdanD1php3").click();

  }

function myFunctionGodProm() {

   var xxxx=1;
    var iiii=1;

    while (iiii < 42) {
    document.getElementById(xxxx).style.visibility = 'visible';
    document.getElementById(xxxx).value=0;
    iiii++;
        xxxx++;
        }
   

    var y = document.getElementById("godinaPromena");
    var x = document.getElementById("mesecPromena2");
    var z = document.getElementById("danDD");
    let dan1 = "1";
    let text = "/";
     let text1 = "-";
     let text2 = "='";
     let text3 = "'";



    document.getElementById("godinaPromena2").value = y.value;
    document.getElementById("danPromena1").value = y.value.concat(text).concat(x.value).concat(text).concat(dan1);

    const dateStr = y.value.concat(text).concat(x.value).concat(text).concat(dan1);
   var dateStr1 = new Date(dateStr);
    document.getElementById("danPromenaD").value =  dateStr1;

    const dateStr2 = y.value.concat(text).concat(x.value).concat(text).concat(z.value);
     var dateStr3 = new Date(dateStr2);
    document.getElementById("danPromenaDD").value =  dateStr3;

    prviDanuMesecuDatum = dateStr1.getDay();
 
   
    let promenaweekdayNumber = prviDanuMesecuDatum;

 
 var month1 = dateStr3.getMonth()+1;
 var year1 = dateStr3.getFullYear();

    
    daysInMonth1 = new Date(year1, month1, 0).getDate();
    var xxx=0;
    var iii=0;
    const dateStrzaKalendar = y.value.concat(text).concat(x.value).concat(text);
    while (iii < daysInMonth1) {
        
        let textpolje1 = "<?php $datum?>";
        let datum = dateStrzaKalendar.concat(xxx+1);
        let textpolje2 = "<?php ; echo $datum."voydra";?>";
    
         
         switch(promenaweekdayNumber) {
            case 0:
                document.getElementById(7+xxx).value = datum;
            break;
            
            default:
            document.getElementById(promenaweekdayNumber+xxx).value = datum;
            }
        
        iii++;
        xxx++;
        }

    switch(promenaweekdayNumber) {
            case 0:{
                var zzz=1;
                while (zzz < 7) {
                    document.getElementById(zzz).style.visibility = 'hidden';
                    zzz++;
                    }
                let preostaliDanidoKrajaMeseca=7+daysInMonth1;
                while (preostaliDanidoKrajaMeseca < 43) {
                     document.getElementById(preostaliDanidoKrajaMeseca).style.visibility = 'hidden';
                        preostaliDanidoKrajaMeseca++;
                   


                }}
            break;
            
            default:{
            var zzz=1;
                while (zzz < promenaweekdayNumber) {
                    document.getElementById(zzz).style.visibility = 'hidden';
                    zzz++;
                    }
                let preostaliDanidoKrajaMeseca=zzz+daysInMonth1;
                while (preostaliDanidoKrajaMeseca < 43) {
                     document.getElementById(preostaliDanidoKrajaMeseca).style.visibility = 'hidden';
                        preostaliDanidoKrajaMeseca++;
                   


                }}
            }

    document.getElementById("numberdanD1php3").click();

}


</script>



