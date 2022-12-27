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
    $TypBraID = $_POST["TypBraID"];
    $Adresse = $_POST["Adresse"];
    $CPBraID = $_POST["CPBraID"];
    $CP = $_POST["CPBraID"];
    $Villes = $_POST["ville"];
    $Pays = $_POST["Pays"];
    $SiteWeb = $_POST["SiteWeb"];
    $Facebook = $_POST["Facebook"];
    $Instagram = $_POST["Instagram"];
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On insère les données reçues
                $sth = $dbco->prepare("
            INSERT IGNORE INTO codepostal(CP, Villes)
            VALUES(:CP, :Villes)");
        $sth->bindParam(':CP',$CP);
        $sth->bindParam(':Villes',$Villes);
        $sth->execute();

                $sth = $dbco->prepare("
            INSERT IGNORE INTO pays (Pays)
            VALUES(:Pays)");
        $sth->bindParam(':Pays',$Pays);
        $sth->execute();

        $PaysBra = $dbco->prepare("SELECT IdPay FROM pays WHERE Pays= '$Pays'");
        $PaysBra->execute();
        $PaysBraID=$PaysBra;

        $sth = $dbco->prepare("
            INSERT INTO Brasseries(NomBra, TypBraID, Adresse, CPBraID, PaysBraID, SiteWeb, Facebook, Instagram)
            VALUES(:NomBra, :TypBraID, :Adresse, :CPBraID, :PaysBraID, :SiteWeb, :Facebook, :Instagram)");
        $sth->bindParam(':NomBra',$NomBra);
        $sth->bindParam(':Adresse',$Adresse);
        $sth->bindParam(':CPBraID',$CPBraID);
        $sth->bindParam(':SiteWeb',$SiteWeb);
        $sth->bindParam(':Facebook',$Facebook);
        $sth->bindParam(':Instagram',$Instagram);
        $sth->bindParam(':TypBraID',$TypBraID);
        $sth->bindParam(':PaysBraID',$PaysBraID);
        $sth->execute();

        
        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:../index.html");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>
		
<?php

    //PAGE DE CONNECTION A LA DB

    $username = "root";
    $password = "";
    $host = "localhost";
    $dbname = "database_bieres";

    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    try {
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
    }
    catch(PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

