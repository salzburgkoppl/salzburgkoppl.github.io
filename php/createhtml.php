<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Überprüfen, ob alle erforderlichen Formularfelder vorhanden sind
  if (isset($_POST['username']) && isset($_FILES['html_file'])) {
    $username = $_POST['username'];
    $file = $_FILES['html_file'];

    // Überprüfen, ob das Datei-Upload erfolgreich war
    if ($file['error'] === UPLOAD_ERR_OK) {
      $tempPath = $file['tmp_name'];
      
      // Dateinamen generieren
      $filename = $username . '.html';
      $uploadPath = 'https://salzburgkoppl.github.io/' . $filename;

      // Die hochgeladene Datei an den Zielort verschieben
      if (move_uploaded_file($tempPath, $uploadPath)) {
        // Erfolgreiche Registrierung
        echo 'Registrierung erfolgreich! Das HTML-Dokument wurde hochgeladen.';
      } else {
        echo 'Fehler beim Hochladen des HTML-Dokuments.';
      }
    } else {
      echo 'Fehler beim Datei-Upload.';
    }
  } else {
    echo 'Nicht alle erforderlichen Felder wurden ausgefüllt.';
  }
}
?>
