<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>insertBra</title>
</head>
	
	<body>
	
    <?php
    $servername = "localhost";
    $database = "database_beers";
    $username = "root";
    $password = "root";
// Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
    if (!$conn) {
        die("Échec de la connexion : " . mysqli_connect_error());
    }
 
    echo "Connexion réussie";

    $NomBra = str_ireplace("'", "\'", $_POST["NomBra"]);
    $TypBraID = $_POST["TypBraID"];
    $Adresse = str_ireplace("'", "\'", $_POST["Adresse"]);
    $CP = $_POST["CPBraID"];
    $Villes = str_ireplace("'", "\'", $_POST["ville"]);
    $Pays = $_POST["Pays"];
    $SiteWeb = $_POST["SiteWeb"];
    $Facebook = $_POST["Facebook"];
    $Instagram = $_POST["Instagram"];
    $DateCreaBra = $_POST["DateCreaBra"];
//gestion des simple quote
    $PresentationBra = str_ireplace("'", "\'", $_POST["PresentationBra"]);
    $StaBraID = $_POST["Statut"];
 
// Get reference to uploaded image
    $image_file = $_FILES["file"];

// Image not defined, let's exit
    if (!isset($image_file)) {
        die('No file uploaded.');
    }
    $ext = pathinfo($image_file["name"], PATHINFO_EXTENSION);
    $image_file["name"] = "logo_".str_ireplace( "\'","'", $NomBra).".".$ext;
// Move the temp image file to the images/ directory
    move_uploaded_file(
// Temp image location
    $image_file["tmp_name"],

// New image location, __DIR__ is the location of the current PHP file
    "../ressources/img/brasserie/" . $image_file["name"]);
    $Logo = "../ressources/img/brasserie/". $image_file["name"];
    $Logo = str_ireplace("'", "\'", $Logo);

//On insère le CP
    $sql = "INSERT IGNORE INTO city(postal_code, name) VALUES($CP, '$Villes')";
    mysqli_query($conn, $sql);

//On récupère l'id du CP  
    $sql = "SELECT * FROM city WHERE postal_code= $CP AND name ='$Villes'";
    $result = mysqli_query($conn, $sql);
    $CPID = mysqli_fetch_assoc($result);
    $CPID = (int) $CPID['id'];

//On insère le Pays 
    $sql = "INSERT IGNORE INTO land (name) VALUES('$Pays')";
    mysqli_query($conn, $sql);

//On récupère l'id du Pays  
    $sql = "SELECT id FROM land WHERE name= '$Pays'";
    $result = mysqli_query($conn, $sql);
    $PayID = mysqli_fetch_assoc($result);
    $PayID = (int)$PayID['id'];

//On insère les données dans brasserie
    $sql = "INSERT INTO brewery (name, type_id, adres, cp_id, land_id, website, facebook, instagram, creation_date, logo, description, status_id)
            VALUES('$NomBra', $TypBraID, '$Adresse', $CPID, $PayID, '$SiteWeb', '$Facebook','$Instagram', $DateCreaBra, '$Logo', '$PresentationBra', $StaBraID)";
    if (mysqli_query($conn, $sql)) {
      echo "Nouveau enregistrement créé avec succès";
} else {
      echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

//On renvoie l'utilisateur vers la page de remerciement
//        header("Location:../index.html");
//    }

?>

