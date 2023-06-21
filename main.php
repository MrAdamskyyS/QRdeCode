<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Adam Sobkowiak odczytywanie kodów QR</title>
</head>
<body>
    <div class="tytulowe slide-in-left">
    <span>ODCZYTYWANIE KODÓW QR</span>
    </div>
    <div class="tytuloweOdczt slide-in-left">
    <a href="#odczyt"> ODCZYTYWANIE </a><a href="#wykres"> STATYSTYKI </a><a href="#omnie"> O AUTORZE </a>
    </div>
    <div class="puste"></div>
    <div class="tytuloweOdczt slide-in-left">
    <span id="odczyt">ODCZYTYWARKA QR</span>
    </div>
    <div class="qrcodereader">
    <div class="wrapper slide-in-left">
        <form method="post" action="#">
            <input type="file" hidden>
            <img src="#" alt="">
            <div class="content">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <p>Przeciągnij i upuść lub Kliknij by załadować kod QR</p>
            </div>
        </form>
        <div class="details">
            <textarea disabled></textarea>
            <div class="buttons">
                <button class="close">Zamknij</button>
                <button class="copy">Kopiuj tekst</button>
            </div>
        </div>
    </div>
    </div>
    <div class="puste"></div>
    <div class="tytuloweWkrs slide-in-left">
    <span id="wykres">WYKRES WYKORZYSTANIA NARZEDZIA</span>
    </div>
    <div class="chartdiv">
    <div class="card slide-in-left">
        <h2>Odczytywane kody</h2>
        <p>Na dzień tygodnia</p>
        <div class="pulse"></div>
        <div class="chart-area">
            <div class="grid"></div>
        </div>
    </div>
    </div>
    <div class="puste"></div>
    <div class="abtme slide-in-left">
    <span id="omnie">O MNIE</span>
    </div>
    <div class="cardabt">
    <div class="card slide-in-left">
        <h2>Adam Sobkowiak</h2>
        <p>Aktualnie jestem studentem informatyki na Politechnice Morskiej w Szczecinie.</p>
    </div>
    </div>
    <div class="stopka slide-in-left">
        <span>Strona utworzona została przez: Adam Sobkowiak L02 Inf3</span>
    </div>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "qrcodedb";

        // Tworzenie połączenia
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Sprawdzenie połączenia
        if ($conn->connect_error) {
            die("Połączenie nieudane: " . $conn->connect_error);
        }   
        
        // Zapytanie SQL
        $sql = "SELECT COUNT(ID), WEEKDAY(Date) AS DayOfWeek FROM qrcodes GROUP BY DayOfWeek";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Przetwarzanie wyników
            $id = array();
            $value = array();
            while ($row = $result->fetch_assoc()) {
                $value[] = $row["COUNT(ID)"];
                $id[] = $row["DayOfWeek"];
            }
        } else {
            echo "Brak wyników.";
        }

        $json_value = json_encode($value);
        $json_id = json_encode($id);

        echo "<script>var useValue = " . $json_value . ";</script>";
        echo "<script>var dayCount = " . $json_id . ";</script>";

        // Zamknięcie połączenia
        $conn->close();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="chart.js"></script>
    <script src="index.js"></script>
</body>

</html>