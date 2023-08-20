<?php
       
$mysqli->query("DELETE FROM arhiva_akta") or die (mysqli_error($mysqli));
     $mysqli->query("DROP TABLE arhiva_akta") or die (mysqli_error($mysqli));

   $mysqli->query("CREATE TABLE arhiva_akta 
        SELECT aktaCopy.idAktaCopy, aktaCopy.NazivAkta, aktaCopy.datumPromene, aktaCopy.vrstaPromene, aktaCopy.Tekst,
        izradjivac.id, izradjivac.firstname, izradjivac.lastname, 
        projekat.idProjekat, projekat.NazivProjekta, subjekat.idSubjekat, subjekat.NazivSubjekta
        FROM (((aktaCopy
        INNER JOIN projekat ON aktaCopy.ProjekatID = projekat.idProjekat)
        INNER JOIN subjekat ON aktaCopy.SubjekatID = subjekat.idSubjekat)
        INNER JOIN izradjivac ON aktaCopy.IzradjivacID = izradjivac.id)

        ") or die (mysqli_error($mysqli)); 

     
$mysqli->query("ALTER TABLE `arhiva_akta` ADD 
`idarhiva_akta` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`idarhiva_akta`)") or die (mysqli_error($mysqli));



 

?>