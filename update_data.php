<?php

if($_POST){

	$id = $_POST["id"];
	$name = $_POST["name"];
	$new_text = $_POST["new_text"];

	include("connexion_base.php");
	$conn = connexion();

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	if($name == "dette"){
		$update = "UPDATE personne set dette='$new_text' where idP=$id";
	}elseif($name == "montantI"){
		$update = "UPDATE personne set montant_initial='$new_text' where idP=$id";
	}elseif($name == "entree"){
		$idV = $_POST["idV"];
		$update = "UPDATE entree_personne set value='$new_text' where idEP=$idV";
	}elseif($name == "sortie"){
		$idV = $_POST["idV"];
		$update = "UPDATE sortie_personne set value='$new_text' where idSP=$idV";
	}

	if ($conn->query($update) === TRUE) {
    	echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	mysqli_close($conn);
}
?>