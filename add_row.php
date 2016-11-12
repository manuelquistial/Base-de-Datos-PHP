<?php

/**
 * @author gencyolcu
 * @copyright 2016
 */
    include("connexion_base.php");

    $type=$_GET["lastType"];
    
    if($type=="1"){
        $table="societe";
    }else{
        $table="personne";
    }
    
    $conn = connexion();
    $insert = mysqli_query($conn,"insert into $table (dette, montant_initial, solde_du) values ('Nouvelle dette','','')");

    if (mysqli_query($conn, $insert)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insert . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);   
?>