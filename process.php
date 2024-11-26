<?php
$link = mysqli_connect('mysql.cba.pl', 'userName123', 'Password123!', 'bpapinski2');
if (!$link) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}



session_start();

if (isset($_POST['edit'])) {
    // Odczytujemy wartości przesłane w formularzu - z uktyrych pol
    $id = $_POST['edit']; 
    $imie = isset($_POST['imie']) ? $_POST['imie'] : null;  
    $nazwisko = isset($_POST['nazwisko']) ? $_POST['nazwisko'] : null;
    $wiek = isset($_POST['wiek']) ? $_POST['wiek'] : null;


    $_SESSION['id'] = $id;
    $_SESSION['imie'] = $imie;
    $_SESSION['nazwisko'] = $nazwisko;
    $_SESSION['wiek'] = $wiek;

    header("Location: edit.php");
}

// Obsługa usuwania rekordu
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    
    $sql = "DELETE FROM table1 WHERE id = $id";
    $result = mysqli_query($link, $sql);
    header("Location: index.php");
    exit;
}

mysqli_close($link);
?>
