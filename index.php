<?php 

	session_start();

    if(empty($_SESSION["choix"])){
        $_SESSION["choix"]=1;
    }

	$choix = $_SESSION["choix"];

    if($choix=="1"){
    	$sortie="";
        $societeC=" checked";
        $personneC="";
        $type="societe";
    }else{
    	
        $societeC="";
        $personneC="checked";
        $type="personne";
    }
    
    $_SESSION["type"]=$type;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestion de revenus</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="css/materialize.min.css" />
	<script src="js/jquery.js" ></script>
	<script src="js/materialize.min.js" ></script>
    <script src="js/script.js"></script>
</head>
<body>
	<nav>
		<div class="nav-wrapper">
		  <ul id="nav-mobile" class="left">
		    <li>
		    	<a><input name="choix" type="radio" id="societe"  class="choix" value="1" <?php echo $societeC;?> />
                <label style="color: #ffffff;" for="societe">Soci&eacute;t&eacute;</label></a>
            </li>
		    <li>
		    	<a><input name="choix" type="radio" id="personne" class="choix" value="2" <?php echo $personneC;?> />
                <label style="color: #ffffff;" for="personne">Personne physique</label></a>
		    </li>
		  </ul>
		</div>
	</nav>
	<div class="container">
		<table>
			<thead>
			  <tr>
			      <th colspan="4"></th>
			      <th colspan="10"><center><span id="year"></span></center></th>
			  </tr>
			  <tr>
			  	<th colspan="4"></th>
			  	<th colspan="2"><center><i class="mdi-content-undo" style="cursor: pointer; float:left" id="prev_month"></i><span id="month1"></span></center></th>
				<th colspan="2"><center><span id="month2"></span></center></th>
				<th colspan="2"><center><span id="month3"></span></center></th>
				<th colspan="2"><center><span id="month4"></span></center></th>
				<th colspan="2"><center><span id="month5"></span><i class="mdi-content-redo" style="cursor: pointer; float:right;" id="next_month"></i></center></th>
			  </tr>
			  <tr>
			  	<th></th>
		        <th><center>Dette</center></th>
		        <th><center>Mt initial</center></th>
		        <th><center>Solde dû</center></th>
			  	<th><center>Entr&eacute;e</center></th>
				<th><center>Sortie</center></th>
				<th><center>Entr&eacute;e</center></th>
				<th><center>Sortie</center></th>
				<th><center>Entr&eacute;e</center></th>
				<th><center>Sortie</center></th>
				<th><center>Entr&eacute;e</center></th>
				<th><center>Sortie</center></th>
				<th><center>Entr&eacute;e</center></th>
				<th><center>Sortie</center></th>
			  </tr>
			</thead>
			<tbody id="data">
			</tbody>
		</table>
		<div class="row">
            <div class="col l1"><button type="button" class="btn" id="btn_add"><i class="mdi-content-add"></i></button></div>
        </div>
	</div>
	<div id="modal" class="modal" style="background-color: #343434; width: 35%; top: 40%;">
		<div class="modal-content">
			<h5 id="message" style="text-align: center;margin: 0px;color: #fff;">Modal Header</h5>
		</div>
	</div>
</body>
</html>