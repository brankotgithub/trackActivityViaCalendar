  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>GlosecDirektor</title>
        
<style>          
       

            table, th, td, input {
                border: 1px solid black;
            }
            table {
                width: 100%;
            }
            th {
            background-color: #386094;
            color: white;
            font-size: 18px;
            }
            span {
                color: red;
            }
            textarea {
                width: 100%;
                height: 150px;
                padding: 12px 20px;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 4px;
                background-color: #f8f8f8;
                font-size: 12px;
                
                }
            
            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
                }

            .col-5 {
                float: left;
                width: 5%;
                margin-top: 6px;
                }

            .col-15 {
                float: left;
                width: 15%;
                margin-top: 6px;
                }
            
            .col-20 {
                float: left;
                width: 20%;
                margin-top: 6px;
                }

            .col-30 {
                float: left;
                width: 30%;
                margin-top: 6px;
                }

            .col-40 {
                float: left;
                width: 40%;
                margin-top: 6px;
                }    

            .col-60 {
                float: left;
                width: 60%;
                margin-top: 6px;
                }

            .col-80 {
                float: left;
                width: 80%;
                margin-top: 6px;
                }
            /* Clear floats after the columns in form*/
            .row:after {
                content: "";
                display: table;
                clear: both;
                }

            .kalendar {
                height: 1px;
            }

            .pocetna {
                margin: auto;
                text-align:right;
                background-color: #386094;
                padding: 5px;
                }
            .center {
                margin: auto;
                width: 70%;
                border: 3px solid black;
                padding: 10px;
                }
            .center2 {
                margin: auto;
                width: 80%;
                border: 3px solid black;
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
                overflow-y: scroll; /* Add the ability to scroll */
                }

            /* Hide scrollbar for Chrome, Safari and Opera */
                .plutanje::-webkit-scrollbar {
                display: none;
                }

            /* Hide scrollbar for IE, Edge and Firefox */
            .plutanje {
                -ms-overflow-style: none;  /* IE and Edge */
                scrollbar-width: none;  /* Firefox */
                }

            .thwidth {
                width: 33%;
                }
            .thwidth1 {
                width: 33%;
                }
            .thwidthAkta {
                width: 25%;
                }
             .thwidthArhivaAkta {
                width: 20%;
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
  border: 3px solid black;
}
.divsesion {
  color:red;
  border: 3px solid blue;
  width: 100%;
  height: 25px;
  text-align: center;   
}

//pocetak dugme
.dropdownPocetak  {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 0px 0px;
  background-color: inherit;
  font: inherit;
  text-align: left;
}
.dropdownPocetak {
  
  overflow: hidden;
}


.dropdown-contentPocetak {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  width: 80%;
  height: 30%;
  color: black;
 margin:0% 0% 0% 10%;
 left: 0;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}


.dropdown-contentPocetak .header {
  background:#386094;
  padding: 16px;
  color: white;
}


.dropdownPocetak:hover  {
  background-color: #386094;
}


.dropdownPocetak:hover .dropdown-contentPocetak {
  display: block;
}

/*top nav nije aktivan u strane ide
        .topnav {
  overflow: hidden;
  background-color: #333;
}



 html
 <div class="topnav" id="myTopnav">
  <a href="https://branko.lovestoblog.com" >Subjekti</a>
  <a href="projekat.php">Projekti</a>
  <a href="IzvrsiteljForm.php">Izvodjac</a>
  <a href="akta.php" class="active-link">Akta</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunctionTopNav()">
    <i class="fa fa-bars"></i>
  </a>
</div>
 
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a.active-link {
  background-color: #04AA6D;
  color: white;
}
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
*/
//dropdown
body {
  margin: 0;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #386094;
}
.navbar a.active-link {
  background-color: #386094;
  color: white;}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  width: 70%;
  height: 45%;
 margin:0% 0% 0% 15%;
 left: 0;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}


.dropdown-content .header {
  background:#386094;
  padding: 16px;
  color: white;
}



.dropdown:hover .dropdown-content {
  display: block;
}



/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  background-color: #ccc;
  height: 40%;
}

.column a {
  float: none;
  color: black;
  padding: 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.column a:hover {
  background-color:  #386094;
  color:white;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    height: auto;
  }
}


.navbar2 {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar2 a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown2 {
  float: right;
  overflow: hidden;
}

.dropdown2 .dropbtn2 {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font: inherit;
  margin: 0;
}

.navbar2 a:hover, .dropdown2:hover .dropbtn2 {
  background-color: #386094;
}
.navbar2 a.active-link {
  background-color: #386094;
  color: white;}

.dropdown-content2 {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  width: 80%;
  height: 45%;
 margin:0% 0% 0% 10%;
 left: 0;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}


.dropdown-content2 .header {
  background:#386094;
  padding: 16px;
  color: white;
}



.dropdown2:hover .dropdown-content2 {
  display: block;
}



/* Create three equal columns that floats next to each other */
.column2 {
  float: left;
  width: 33.33%;
  padding: 10px;
  background-color: #ccc;
  height: 40%;
}

.column2 a {
  float: none;
  color: black;
  padding: 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.column2 a:hover {
  background-color:  #386094;
  color:white;
}

/* Clear floats after the columns */
.row2:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column2 {
    width: 100%;
    height: auto;
  }

  //deo za formu
  .col-5, .col-15, .col-20, .col-30, .col-40, .col-60, .col-80, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}


</style>