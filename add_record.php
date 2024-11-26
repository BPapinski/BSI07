<?php
    $link = mysqli_connect('mysql.cba.pl', 'userName123', 'Password123!', 'bpapinski2');
    if (!$link) {
        die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $imie = isset($_POST['imie']) ? $_POST['imie'] : null;
        $nazwisko = isset($_POST['nazwisko']) ? $_POST['nazwisko'] : null;
        $wiek = isset($_POST['wiek']) ? $_POST['wiek'] : null;

        if ($imie && $nazwisko && $wiek) {
            $sql = "INSERT INTO table1 (Imie, Nazwisko, Wiek) VALUES ('$imie', '$nazwisko', $wiek)";
            $wynik2 = mysqli_query($link, $sql);

            if ($wynik2) {
                echo "Rekord dodany pomyślnie.";
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
