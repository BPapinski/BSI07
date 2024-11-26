<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .new-record {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        .new-record h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"], input[type="number"], button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        input[type="text"], input[type="number"] {
            background-color: #f9f9f9;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Mobile responsiveness */
        @media (max-width: 600px) {
            .new-record {
                width: 90%;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <?php
        session_start();

        // Odczyt danych z sesji
        $id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
        $imie = isset($_SESSION['imie']) ? $_SESSION['imie'] : null;
        $nazwisko = isset($_SESSION['nazwisko']) ? $_SESSION['nazwisko'] : null;
        $wiek = isset($_SESSION['wiek']) ? $_SESSION['wiek'] : null;
    ?>

    <div class="new-record">
        <h2>Edytuj rekord</h2>
        <form action="edit_record.php" method="post">
            <div class="form-group">
                <label for="imie">Imię:</label>
                <input type="text" id="imie" name="imie" value="<?php echo htmlspecialchars($imie); ?>" required>
            </div>
            <div class="form-group">
                <label for="nazwisko">Nazwisko:</label>
                <input type="text" id="nazwisko" name="nazwisko" value="<?php echo htmlspecialchars($nazwisko); ?>" required>
            </div>
            <div class="form-group">
                <label for="wiek">Wiek:</label>
                <input type="number" id="wiek" name="wiek" min="0" max="120" value="<?php echo htmlspecialchars($wiek); ?>" required>
            </div>

            <input type="hidden" id="id" name="id" value="<?php echo $id ?>" required>
            
            <div class="form-group">
                <button type="submit">Edytuj</button>
            </div>
        </form>
    </div>
</body>
</html>
