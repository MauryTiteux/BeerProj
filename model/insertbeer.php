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
    
    $Nombie = $_POST["NomBie"];
    $Alc = $_POST["Alc"];
    

    // Get reference to uploaded image
$image_file = $_FILES["file"];
// Image not defined, let's exit
if (!isset($image_file)) {
    die('No file uploaded.');
}
$ext = pathinfo($image_file["name"], PATHINFO_EXTENSION);
$image_file["name"] = "logo_".$NomBie.".".$ext;
// Move the temp image file to the images/ directory
move_uploaded_file(
    // Temp image location
    $image_file["tmp_name"],
    // New image location, __DIR__ is the location of the current PHP file
    "../ressources/img/bieres/" . $image_file["name"]);
    $PhotoBie = "../ressources/img/bieres/". $image_file["name"];

        //On insère les données reçues
        $sth = $dbco->prepare("
        */    INSERT IGNORE INTO codepostal(CP, Villes)
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
            INSERT INTO bieres(NomBie, Alc, PhotoBie)
            VALUES(:NomBie, :Alc, :PhotoBie)");
        $sth->bindParam(':NomBie',$NomBie);
        $sth->bindParam(':Alc',$Alc);
        $sth->bindParam(':PhotoBie',$PhotoBie);
        $sth->execute();

        
        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:../index.html");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>