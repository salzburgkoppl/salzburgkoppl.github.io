<!DOCTYPE html>
<html>
<head>
    <title>Suchergebnisse</title>
</head>
<body>
    <h1>Suchergebnisse</h1>

    <?php
    // Datenbankverbindung herstellen
    $servername = "sql7.freemysqlhosting.net";
    $username = "sql7623425";
    $password = "bljBipiwEd";
    $dbname = "sql7623425";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Überprüfen, ob die Verbindung erfolgreich war
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // Suchanfrage verarbeiten
    $query = $_GET['query'];

    $sql = "SELECT * FROM deine_tabelle WHERE spalte LIKE '%$query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ergebnisse anzeigen
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . $row['spalte'] . "</p>";
        }
    } else {
        echo "Keine Ergebnisse gefunden.";
    }

    // Verbindung schließen
    $conn->close();
    ?>
</body>
</html>