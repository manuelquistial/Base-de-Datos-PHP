<?php

/**
 * @author gencyolcu
 * @copyright 2016
 */

function connexion(){
    $connexion=mysqli_connect("localhost","admin","1234","gestionrevenue");
    return $connexion;
}

//connexion();

?>