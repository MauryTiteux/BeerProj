<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>insertBeer</title>
</head>
	
	<body>
		
	<?php
    $servername = "localhost";
    $database = "database_bieres";
    $username = "root";
    $password = "root";
// Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
    if (!$conn) {
        die("Échec de la connexion : " . mysqli_connect_error());
    }
 
    echo "Connexion réussie";

    $Nom = $_POST["NomBie"];
    $NomBra =$_POST['NomBra'];
    $Style = $_POST["Style"];
    $Fermentation = $_POST["Fermentation"];
    $Alc = str_ireplace(",", ".", $_POST["Alc"]);
    $IBU = $_POST["IBU"];
    $EBC = $_POST["EBC"];
    $Presentation = str_ireplace("'", "\'", $_POST["PresentationBie"]);
    $Ingredients = str_ireplace("'", "\'", $_POST['Ingredients']);
    $IDFor = $_POST['Formats'];
    $TypeVer = $_POST['TypeVer'];
    $DateCrea = $_POST['DateCreaBie'];
    var_dump($_FILES["file"]);
// Get reference to uploaded image
    $image_file = $_FILES["file"];
// Image not defined, let's exit
    if (isset($image_file)) {
        $ext = pathinfo($image_file["name"], PATHINFO_EXTENSION);
        $image_file["name"] = "Photo_".$Nom.".".$ext;
// Move the temp image file to the images/ directory
        move_uploaded_file(
// Temp image location
        $image_file["tmp_name"],
// New image location, __DIR__ is the location of the current PHP file
        "../ressources/img/bieres/" . $image_file["name"]);
        $Photo = "../ressources/img/bieres/". $image_file["name"];
    }
    else {die('No file uploaded.');}
    //$Photo = "";

//On insère le style
    $sql = "INSERT IGNORE INTO stylesbieres (Style) VALUES('$Style')";
    mysqli_query($conn, $sql);

//On récupère l'id du style  
    $sql = "SELECT id FROM stylesbieres WHERE Style= '$Style'";
    $result = mysqli_query($conn, $sql);
    $StyID = mysqli_fetch_assoc($result);
    $StyID = (int) $StyID['id'];

//On insère les données de la bière
    $sql = "INSERT INTO bieres (Nom, StyID, FerID, Alc, IBU, EBC, Presentation, Ingredients, Photo, TypVerID, DateCrea)
            VALUES ('$Nom', $StyID, $Fermentation, $Alc,$IBU, $EBC, '$Presentation', '$Ingredients', '$Photo', $TypeVer, $DateCrea)";
    mysqli_query($conn, $sql);

//On insère la brasserie si elle n'existe pas encore
    $sql = "INSERT IGNORE INTO brasseries (Nom) VALUES('$NomBra')";
    mysqli_query($conn, $sql);

//On récupère l'id de la brasserie  
    $sql = "SELECT id FROM brasseries WHERE Nom= '$NomBra'";
    $result = mysqli_query($conn, $sql);
    $BraID = mysqli_fetch_assoc($result);
    $BraID = (int) $BraID['id'];

//On récupère l'id de la biere 
    $sql = "SELECT id FROM bieres WHERE Nom= '$Nom'";
    $result = mysqli_query($conn, $sql);
    $BieID = mysqli_fetch_assoc($result);
    $BieID = (int) $BieID['id'];

//On insère l' id brasserie et l'id biere pour les lier
    $sql = "INSERT INTO bieresbrasseries (BieID, BraID) VALUES($BieID, $BraID)";
    mysqli_query($conn, $sql);

//On insère les id du format et l'id de la biere
    foreach ($IDFor as &$value) {
    $value = (int) $value;
    $sql = "INSERT INTO formatsbieres (BieID, ForID) VALUES($BieID, $value)";
    mysqli_query($conn, $sql);
    };

/*
        
        //On renvoie l'utilisateur vers la page de remerciement
       // header("Location:../index.html");
*/

    mysqli_close($conn);
?>