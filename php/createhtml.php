<?php
// Verbindungsdaten zur Datenbank
$servername = "localhost";
$username = "benutzername";
$password = "passwort";
$dbname = "datenbankname";

// Datenbankverbindung herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen, ob die Verbindung erfolgreich war
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage zum Abrufen des Benutzernamens
$sql = "SELECT username FROM benutzer";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Eine HTML-Seite für jeden Benutzernamen erstellen und hochladen
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $
}
?>