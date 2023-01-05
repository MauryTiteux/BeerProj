<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>insertBeer</title>
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
    
    $NomBie = $_POST["NomBie"];
    $NomBra =$_POST['NomBra'];
    $Style = $_POST["Style"];
    $Fermentation = $_POST["Fermentation"];
    $Alc = $_POST["Alc"];
    $IBU = $_POST["IBU"];
    $EBC = $_POST["EBC"];
    $PresentationBie = $_POST["PresentationBie"];
    $Ingredients = $_POST['Ingredients'];
    $IDFor = $_POST['Formats'];
    $DateCreaBie = $_POST['DateCreaBie'];
    
    
/*   // Get reference to uploaded image
$image_file = $_FILES["file"];
// Image not defined, let's exit
if (isset($image_file)) {
    
$ext = pathinfo($image_file["name"], PATHINFO_EXTENSION);
$image_file["name"] = "Photo_".$NomBie.".".$ext;
// Move the temp image file to the images/ directory
move_uploaded_file(
    // Temp image location
    $image_file["tmp_name"],
    // New image location, __DIR__ is the location of the current PHP file
    "../ressources/img/bieres/" . $image_file["name"]);
    $PhotoBie = "../ressources/img/bieres/". $image_file["name"];
}
else {die('No file uploaded.');
    $PhotoBie="";
}

*/
        //On insère les données reçues

        $sth = $dbco->prepare("
            INSERT IGNORE INTO stylesbieres (Style)
            VALUES(:Style)");
        $sth->bindParam(':Style',$Style);
        $sth->execute();

        $Sty = $dbco->prepare("SELECT IdSty FROM stylesbieres WHERE Style= '$Style'");
        $Sty->execute();
        $IDStyle= (int) $Sty;

        $sth = $dbco->prepare("
            INSERT INTO bieres(NomBie, StyBieID, FerBieID, Alc, IBU, EBC, PresentationBie, Ingredients, PhotoBie, DateCreaBie)
            VALUES(:NomBie, :IDStyle, :Fermentation, :Alc,:IBU, :EBC, :PresentationBie, :Ingredients, :PhotoBie, :DateCreaBie)");
        $sth->bindParam(':NomBie',$NomBie);
        $sth->bindParam(':IDStyle',$IDStyle);
        $sth->bindParam(':Fermentation',$Fermentation);
        $sth->bindParam(':Alc',$Alc);
        $sth->bindParam(':IBU',$IBU);
        $sth->bindParam(':EBC',$EBC);
        $sth->bindParam(':PresentationBie',$PresentationBie);
        $sth->bindParam(':Ingredients',$Ingredients);
        $sth->bindParam(':PhotoBie',$PhotoBie);
        $sth->bindParam(':DateCreaBie',$DateCreaBie);
        $sth->execute();

        $sth = $dbco->prepare("
            INSERT IGNORE INTO brasseries (NomBra)
            VALUES(:NomBra)");
        $sth->bindParam(':NomBra',$NomBra);
        $sth->execute();

        $Bra = $dbco->prepare("SELECT IDBra FROM brasseries WHERE NomBra= '$NomBra'");
        $Bra->execute();
        $IDBra= (int) $Bra;
        $Bie = $dbco->prepare("SELECT ID FROM bieres WHERE NomBie= '$NomBie'");
        $Bie->execute();
        $IDBie= (int) $Bie;

        $sth = $dbco->prepare("
            INSERT IGNORE INTO bieresbrasseries (BieresID, BrasseriesID)
            VALUES(:IDBie, :IDBra)");
        $sth->bindParam(':IDBie',$IDBie);
        $sth->bindParam(':IDBra',$IDBra);
        $sth->execute();

        $sth = $dbco->prepare("
            INSERT IGNORE INTO formatsbieres (BieForID, IDFor)
            VALUES(:IDBie, :IDFor)");
        $sth->bindParam(':IDBie',$IDBie);
        $sth->bindParam(':IDFor',$IDFor);
        $sth->execute();

        
        //On renvoie l'utilisateur vers la page de remerciement
       // header("Location:../index.html");

        header(var_dump($IDFor));
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>