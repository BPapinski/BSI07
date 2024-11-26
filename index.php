<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        /* Styl dla przycisków w .actions */
        .actions {
            margin-top: 10px;
            margin-bottom: 10px;
            display: flex;
            gap: 10px;
            justify-content: center;  /* Centrowanie przycisków w poziomie */
            align-items: center;      /* Centrowanie przycisków w pionie */
            height: 40px;             /* Określenie wysokości kontenera przycisków */
        }

        /* Stylowanie przycisków */
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Przycisk edycji */
        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }

        .edit-btn:hover {
            background-color: #45a049;
        }

        /* Przycisk usuwania */
        .delete-btn {
            background-color: #f44336;
            color: white;
        }

        .delete-btn:hover {
            background-color: #e53935;
        }

    </style>

    <div>
        <?php
            $link = mysqli_connect('mysql.cba.pl', 'userName123', 'Password123!', 'bpapinski2'); // cba

            //$link = mysqli_connect('localhost', 'root', '', 'mydb'); // lokalnie
            if (!$link) {
                die('<div class="status">Could not connect: ' . mysqli_connect_error() . '</div>');
            }
            echo '<div class="status">Connected successfully</div>';
            
            $sql = "SELECT * FROM table1";
            $result = mysqli_query($link, $sql);
        ?>
    </div>
    <div class="container">
        <h1>Record List</h1>
        <div class="records">
        <?php
            while ($line = mysqli_fetch_assoc($result)) {
                echo "<form method='post' action='process.php'>";
                echo "<div class='record' id='record-" . $line['id'] . "'>";
                echo "<span>ID: " . $line['id'] . "</span>";
                echo "<span>Imię: " . $line['Imie'] . "</span>";
                echo "<span>Nazwisko: " . $line['Nazwisko'] . "</span>";
                echo "<span>Wiek: " . $line['Wiek'] . "</span>";

                // Ukryte pola do przesyłania danych
                echo "<input type='hidden' name='imie' value='" . $line['Imie'] . "'>";
                echo "<input type='hidden' name='nazwisko' value='" . $line['Nazwisko'] . "'>";
                echo "<input type='hidden' name='wiek' value='" . $line['Wiek'] . "'>";

                // Przyciski do edycji i usuwania
                echo "<div class='actions'>";
                // Przycisk edycji
                echo "<button type='submit' class='edit-btn' name='edit' value='" . $line['id'] . "'>Edit</button>";
                // Przycisk usuwania
                echo "<button type='submit' class='delete-btn' name='delete' value='" . $line['id'] . "'>Delete</button>";
                echo "</div>";

                echo "</div>";
                echo "</form>";
            }
        ?>

        </div>
        <div class="new-record">
            <h2>Dodaj nowy rekord</h2>
            <form action="add_record.php" method="post">
                <div class="form-group">
                    <label for="imie">Imię:</label>
                    <input type="text" id="imie" name="imie" required>
                </div>
                <div class="form-group">
                    <label for="nazwisko">Nazwisko:</label>
                    <input type="text" id="nazwisko" name="nazwisko" required>
                </div>
                <div class="form-group">
                    <label for="wiek">Wiek:</label>
                    <input type="number" id="wiek" name="wiek" min="0" max="120" required>
                </div>
                <div class="form-group">
                    <button type="submit">Dodaj rekord</button>
                </div>
            </form>
        </div>
        <br>
        <div>
            <a href="https://bpapinski.github.io/BSI/Index/index.html">
                <div class="form-group">
                        <button type="button">Powrót</button>
                </div>
            </a>
        </div>
    </div>
    <?php 
        mysqli_close($link);
    ?>
    
</body>
</html>
