<?php

if($_POST){

	$sumMonE1 = 0;
	$sumMonE2 = 0;
	$sumMonE3 = 0;
	$sumMonE4 = 0;
	$sumMonE5 = 0;

	$sumMonS1 = 0;
	$sumMonS2 = 0;
	$sumMonS3 = 0;
	$sumMonS4 = 0;
	$sumMonS5 = 0;

	$months = array($_POST['month1'], $_POST['month2'], $_POST['month3'], $_POST['month4'], $_POST['month5']);
	$mDataBase = array(" "," "," "," "," ");
	$ids = array(" "," "," "," "," ");

	include("connexion_base.php");

    $conn = connexion();

    if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$perEntree = "SELECT personne.idP, personne.dette, personne.montant_initial, personne.solde_du From personne INNER JOIN entree_personne ON personne.idP=entree_personne.idP GROUP BY entree_personne.idP ORDER BY personne.dette ASC";
    $entree = "SELECT entree_personne.idEP, entree_personne.idP, entree_personne.value, entree_personne.month, entree_personne.annee From entree_personne WHERE month = $months[0] OR month = $months[1] OR month = $months[2] OR month = $months[3] OR month = $months[4]";

    $rPerEntree = $conn->query($perEntree);

	if ($rPerEntree->num_rows > 0) {
	    while($rowP = $rPerEntree->fetch_assoc()) {
	    	$mDataBase = array(" "," "," "," "," ");
	    	$ids = array(" "," "," "," "," ");
	        echo '<tr class="line" id="'.$rowP["idP"].'">
		        <td></td>
		        <td><input class="inputs" type="text" name="dette" value="'.$rowP["dette"].'"></td>
		        <td><input class="inputs" type="text" name="montantI" value="'.$rowP["montant_initial"].'"></td>
		        <td><input class="inputs" type="text" name="soldeDu" value="'.$rowP["solde_du"].'"></td>';
		    $rEntree = $conn->query($entree);
		    while ($rowE = $rEntree->fetch_assoc()) {
		    	if($rowP["idP"] == $rowE["idP"]){
			    	if($rowE["month"] == $months[0]){
			    		$mDataBase[0] = $rowE["value"];
			    		$sumMonE1 += $rowE['value'];
			    		$ids[0] = $rowE['idEP'];
			    	}elseif($rowE["month"] == $months[1]){
			    		$mDataBase[1] = $rowE["value"];
			    		$sumMonE2 += $rowE['value'];
			    		$ids[1] = $rowE['idEP'];
			    	}elseif($rowE["month"] == $months[2]){
			    		$mDataBase[2] = $rowE["value"];
			    		$sumMonE3 += $rowE['value'];
			    		$ids[2] = $rowE['idEP'];
			    	}elseif($rowE["month"] == $months[3]){
			    		$mDataBase[3] = $rowE["value"];
			    		$sumMonE4 += $rowE['value'];
			    		$ids[3] = $rowE['idEP'];
			    	}elseif($rowE["month"] == $months[4]){
			    		$mDataBase[4] = $rowE["value"];
			    		$sumMonE5 += $rowE['value'];
			    		$ids[4] = $rowE['idEP'];
			    	}
			    }
		    }

		    $cont = 0;
			foreach($mDataBase as $value){
				if($value != ""){
					echo '	<td><input class="inputs" id="'.$ids[$cont].'" type="text" name="entree" value="'.$value.'"></td>
		        			<td><input class="inputs" id="'.$ids[$cont].'" type="text" name="sortie" value=""></td>';
				}else{
					echo '	<td><input class="inputs" id="'.$ids[$cont].'" type="text" name="entree" value=""></td>
		        			<td><input class="inputs" id="'.$ids[$cont].'" type="text" name="sortie" value=""></td>';
				}
				++$cont;
			}

		    echo '	</tr>';
	    }

	    mysqli_close($conn);
	   
	} else {
	    echo "0 results";
	}

	mysqli_close($conn);

	$conn = connexion();

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

    $perSortie = "SELECT personne.idP, personne.dette, personne.montant_initial, personne.solde_du From personne INNER JOIN sortie_personne ON personne.idP=sortie_personne.idP GROUP BY sortie_personne.idP ORDER BY personne.dette ASC";
	$sortie = "SELECT sortie_personne.idSP, sortie_personne.idP, sortie_personne.value, sortie_personne.month, sortie_personne.annee From sortie_personne WHERE month = $months[0] OR month = $months[1] OR month = $months[2] OR month = $months[3] OR month = $months[4]";

	$rPerSortie = $conn->query($perSortie);

	if ($rPerSortie->num_rows > 0) {
	    while($rowP = $rPerSortie->fetch_assoc()) {
	    	$mDataBase = array(" "," "," "," "," ");
	    	$ids = array(" "," "," "," "," ");
	        echo '<tr class="line" id="'.$rowP["idP"].'">
		        <td></td>
		        <td><input class="inputs" type="text" name="dette" value="'.$rowP["dette"].'"></td>
		        <td><input class="inputs" type="text" name="montantI" value="'.$rowP["montant_initial"].'"></td>
		        <td><input class="inputs" type="text" name="soldeDu" value="'.$rowP["solde_du"].'"></td>';
		    $rSortie = $conn->query($sortie);
		    while ($rowE = $rSortie->fetch_assoc()) {
		    	if($rowP["idP"] == $rowE["idP"]){
			    	if($rowE["month"] == $months[0]){
			    		$mDataBase[0] = $rowE["value"];
			    		$sumMonS1 += $rowE['value'];
			    		$ids[0] = $rowE['idSP'];
			    	}elseif($rowE["month"] == $months[1]){
			    		$mDataBase[1] = $rowE["value"];
			    		$sumMonS2 += $rowE['value'];
			    		$ids[1] = $rowE['idSP'];
			    	}elseif($rowE["month"] == $months[2]){
			    		$mDataBase[2] = $rowE["value"];
			    		$sumMonS3 += $rowE['value'];
			    		$ids[2] = $rowE['idSP'];
			    	}elseif($rowE["month"] == $months[3]){
			    		$mDataBase[3] = $rowE["value"];
			    		$sumMonS4 += $rowE['value'];
			    		$ids[3] = $rowE['idSP'];
			    	}elseif($rowE["month"] == $months[4]){
			    		$mDataBase[4] = $rowE["value"];
			    		$sumMonS5 += $rowE['value'];
			    		$ids[4] = $rowE['idSP'];
			    	}
			    }
		    }

		    $cont = 0;
			foreach($mDataBase as $value){
				if($value != ""){
					echo '	<td><input class="inputs" id="'.$ids[$cont].'" type="text" name="entree" value=""></td>
		        			<td><input class="inputs" id="'.$ids[$cont].'" type="text" name="sortie" value="'.$value.'"></td>';
				}else{
					echo '	<td><input class="inputs" id="'.$ids[$cont].'" type="text" name="entree" value=""></td>
		        			<td><input class="inputs" id="'.$ids[$cont].'" type="text" name="sortie" value=""></td>';
				}
				++$cont;
			}

		    echo '	</tr>';
	    }
	    	echo '  <tr>
	    				<td colspan="4"></td>
		    			<td><input class="inputs" type="text" name="tEntree" value="'.$sumMonE1.'"></td>
		        		<td><input class="inputs" type="text" name="tSortie" value="'.$sumMonS1.'"></td>
		        		<td><input class="inputs" type="text" name="tEntree" value="'.$sumMonE2.'"></td>
		        		<td><input class="inputs" type="text" name="tSortie" value="'.$sumMonS2.'"></td>
		        		<td><input class="inputs" type="text" name="tEntree" value="'.$sumMonE3.'"></td>
		        		<td><input class="inputs" type="text" name="tSortie" value="'.$sumMonS3.'"></td>
		        		<td><input class="inputs" type="text" name="tEntree" value="'.$sumMonE4.'"></td>
		        		<td><input class="inputs" type="text" name="tSortie" value="'.$sumMonS4.'"></td>
		        		<td><input class="inputs" type="text" name="tEntree" value="'.$sumMonE5.'"></td>
		        		<td><input class="inputs" type="text" name="tSortie" value="'.$sumMonS5.'"></td>	
		    		</tr>';
	    	echo '	<script src="js/script2.js"></script>';
	} else {
	    echo "0 results";
	}
}
?>