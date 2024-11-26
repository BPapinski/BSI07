<?php
    $link = mysqli_connect('mysql.cba.pl', 'userName123', 'Password123!', 'bpapinski2');
    if (!$link) {
        die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Pobranie danych z formularza
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $imie = isset($_POST['imie']) ? $_POST['imie'] : null;
        $nazwisko = isset($_POST['nazwisko']) ? $_POST['nazwisko'] : null;
        $wiek = isset($_POST['wiek']) ? $_POST['wiek'] : null;

        if ($id && $imie && $nazwisko && $wiek) {
            // Zapytanie do bazy danych do aktualizacji rekordu
            $sql = "UPDATE table1 SET Imie='$imie', Nazwisko='$nazwisko', Wiek=$wiek WHERE id=$id";
            $wynik2 = mysqli_query($link, $sql);

            if ($wynik2) {
                echo "Rekord zaktualizowany pomyślnie.";
                // Można przekierować z powrotem do strony z listą rekordów
                header("Location: index.php");
                exit;
            } else {
                echo "Błąd zapytania SQL: " . mysqli_error($link);
            }
        } else {
            echo "Wypełnij wszystkie pola formularza.";
        }
    }

    mysqli_close($link);
?>
