<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>insertBra</title>
</head>
	
	<body>
		
	<?php
    $serveur = "localhost";
    $dbname = "database_bieres";
    $user = "root";
    $pass = "";
    
    $NomBra = $_POST["NomBra"];
    $Adresse = $_POST["Adresse"];
    $CPBraID = $_POST["CPBraID"];
    $SiteWeb = $_POST["SiteWeb"];
    $Facebook = $_POST["Facebook"];
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO Brasseries(NomBra, Adresse, CPBraID, SiteWeb, Facebook)
            VALUES(:NomBra, :Adresse, :CPBraID, :SiteWeb, :Facebook)");
        $sth->bindParam(':NomBra',$NomBra);
        $sth->bindParam(':Adresse',$Adresse);
        $sth->bindParam(':CPBraID',$CPBraID);
        $sth->bindParam(':SiteWeb',$SiteWeb);
        $sth->bindParam(':Facebook',$Facebook);
        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:../index.html");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>
		
		</body>
