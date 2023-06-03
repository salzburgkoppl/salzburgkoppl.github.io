<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
</head>

<body>
<h1>Sign Up</h1>
<form method="POST" action="php/signup.php">
  <label for="username">Benutzername:</label>
  <input type="text" id="username" name="username" required>
  <br>
  <label for="password">Passwort:</label>
  <input type="password" id="password" name="password" required>
  <br>
  <input type="submit" value="Registrieren">
</form>


<?php
// Verbindungsdaten zur Datenbank
$servername = "localhost";
$username = "benutzername";
$password = "passwort";
$dbname = "datenbankname";

// Formulardaten erfassen
$user = $_POST['username'];
$pass = $_POST['password'];

// Datenbankverbindung herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen, ob die Verbindung erfolgreich war
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage zum Einfügen des Benutzernamens und Passworts in die Tabelle
$sql = "INSERT INTO benutzer (username, password) VALUES ('$user', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Registrierung erfolgreich.";
} else {
    echo "Fehler bei der Registrierung: " . $conn->error;
}

// Datenbankverbindung schließen
$conn->close();
?>

</body>
</html>