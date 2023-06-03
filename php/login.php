<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Log In</title>
  </head>

<?php
// Datenbankverbindung herstellen
$db_host = "localhost"; // Hostname
$db_name = "deine_datenbank"; // Datenbankname
$db_user = "dein_benutzername"; // Benutzername für die Datenbank
$db_pass = "dein_passwort"; // Passwort für die Datenbank

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
if ($conn->connect_error) {
    die("Verbindungsfehler: " . $conn->connect_error);
}

// Überprüfen, ob das Login-Formular gesendet wurde
if(isset($_POST['username']) && isset($_POST['password'])){
    // Benutzernamen und Passwort aus dem Formular erhalten
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Überprüfen, ob der Benutzer in der Datenbank existiert
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        // Erfolgreiches Login
        // Weiterleitung zur entsprechenden HTML-Seite
        header("Location: $username.html");
        exit();
    } else {
        // Falsche Anmeldeinformationen
        echo "Falscher Benutzername oder Passwort.";
    }
}

// HTML-Formular für den Login
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Benutzername" required><br>
        <input type="password" name="password" placeholder="Passwort" required><br>
        <input type="submit" value="Anmelden">
    </form>
</body>
</html>
