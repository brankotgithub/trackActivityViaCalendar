<?php
$mysqli->query("DELETE FROM spia_join") or die (mysqli_error($mysqli));
         $mysqli->query("DROP TABLE spia_join") or die (mysqli_error($mysqli));

            $mysqli->query("CREATE TABLE spia_join 
            SELECT akta.idAkta, akta.NazivAkta, akta.StatusProcesaIzrade1, akta.Tekst, akta.DatumKreiranjaAkta,
            akta.BrojUgovora, akta.DatumUgovora, akta.StatusProcesaIzrade2, akta.ZavrsetakIzrade, akta.DatumPoslatNadlOrganu,
            akta.AzuriranjeAkta, akta.DatumDostavElemIzrPlana, akta.DatumDobijanjaSaglasnostiAkta, akta.KonacanZavrsetak,
            izradjivac.id, izradjivac.firstname, izradjivac.lastname, 
            projekat.idProjekat, projekat.NazivProjekta,          
            subjekat.idSubjekat, subjekat.NazivSubjekta
            FROM (((akta
            INNER JOIN projekat ON akta.ProjekatID = projekat.idProjekat)
            INNER JOIN subjekat ON akta.SubjekatID = subjekat.idSubjekat)
            INNER JOIN izradjivac ON akta.IzradjivacID = izradjivac.id)

            ") or die (mysqli_error($mysqli));
     
        $mysqli->query("ALTER TABLE `spia_join` ADD 
        `idSPIA` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`idSPIA`)") or die (mysqli_error($mysqli));

?>