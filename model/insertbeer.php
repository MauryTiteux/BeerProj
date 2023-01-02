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
    
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
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
    $DateCreaBra = $_POST["DateCreaBra"];
    $PresentationBra = $_POST["PresentationBra"];
    $StaBraID = $_POST["Statut"];

    // Get reference to uploaded image
$image_file = $_FILES["file"];

// Image not defined, let's exit
if (!isset($image_file)) {
    die('No file uploaded.');
}
$ext = pathinfo($image_file["name"], PATHINFO_EXTENSION);
$image_file["name"] = "logo_".$NomBra.".".$ext;
// Move the temp image file to the images/ directory
move_uploaded_file(
    // Temp image location
    $image_file["tmp_name"],

    // New image location, __DIR__ is the location of the current PHP file
    "../ressources/img/brasserie/" . $image_file["name"]);
    $Logo = "../ressources/img/brasserie/". $image_file["name"];

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
        $PayBraID= (int) $PaysBra;

        $sth = $dbco->prepare("
            INSERT INTO Brasseries(NomBra, TypBraID, Adresse, CPBraID, PayBraID, SiteWeb, Facebook, Instagram, DateCreaBra, Logo, PresentationBra, StaBraID)
            VALUES(:NomBra, :TypBraID, :Adresse, :CPBraID, :PayBraID, :SiteWeb, :Facebook, :Instagram, :DateCreaBra, :Logo, :PresentationBra, :StaBraID)");
        $sth->bindParam(':NomBra',$NomBra);
        $sth->bindParam(':Adresse',$Adresse);
        $sth->bindParam(':CPBraID',$CPBraID);
        $sth->bindParam(':SiteWeb',$SiteWeb);
        $sth->bindParam(':Facebook',$Facebook);
        $sth->bindParam(':Instagram',$Instagram);
        $sth->bindParam(':TypBraID',$TypBraID);
        $sth->bindParam(':PayBraID',$PayBraID);
        $sth->bindParam(':DateCreaBra',$DateCreaBra);
        $sth->bindParam(':PresentationBra',$PresentationBra);
        $sth->bindParam(':StaBraID',$StaBraID);
        $sth->bindParam(':Logo',$Logo);
        $sth->execute();

        
        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:../index.html");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>