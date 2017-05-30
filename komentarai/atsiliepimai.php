<!DOCTYPE html>
<html>
	<head>Komentaru skiltis</head>
	<body>   
		<div class="content">
			<form method="post" action="insert.php">
				Vardas<br>
				<input type="text" name="username"></input> <br>
				Komentaras<br>
				<textarea type="text" name="comment"></textarea> <br>
				<input type="submit" name="submit"/>
			</form>
			<?php 
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "mano";
				
				$conn = new mysqli($servername, $username, $password, $dbname);
				
				if ($conn->connect_error) {
					die("Nepavyko prisijungti spausk ALT+F4: " . $conn->connect_error);
				} 
				
				$sql = "SELECT username, comment, date FROM comments order by date desc";
				
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
					echo "Komentaras: <br>".$row["comment"]."<br> ".$row["username"]."<br> " .$row["date"]." <hr/>";
					}
				}
				else {
					echo "Nera komentaru";
				}
			?>
		</div>
	</body>
</html>