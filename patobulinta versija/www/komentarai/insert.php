<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mano";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Nepavyko prisijungti spausk ALT+F4: " . $conn->connect_error);
} 
echo "Pavyko prisijungti spausk ALT+F4"; 

$sql = "INSERT INTO comments ( 
				article_id, 
				page, 
				username, 
				subject, 
				contact, 
				comment, 
				ip, 
				date, 
				time)
		VALUES (1, 
				'komentarai', 
				'".$_POST["username"]."',
				'',
				'',
				'".$_POST["comment"]."',
				'',
				Now(),
				'')";

if ($conn->query($sql) === TRUE) {
    echo "Duomenys sukurti";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}				

$conn->close();

header('Location: ../index.php');

?>
