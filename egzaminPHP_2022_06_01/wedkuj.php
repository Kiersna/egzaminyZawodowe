<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>

    <div class="baner">
        <h1>Portal dla wędkarzy</h1>
    </div>
    <div class="lewy1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>    <?php
        $conn = mysqli_connect('localhost', 'root',
        '', 'wedkowanie');
        $query = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3;";
        $wynik = mysqli_query($conn, $query);
        $tab = mysqli_fetch_array($wynik);
        while($row = mysqli_fetch_array($wynik)){
            echo '<li>'.$row[0].' pływa w rzece '.$row[1].', '.$row[2].'</li>';
        }
        mysqli_close($conn);
    ?></ol>
    </div>
    <div class="prawy">
        <img src="ryba1.jpg" alt="Sum">
        <a href="kwarendy.txt">Pobierz kwerendy</a>
    </div>
    <div class="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr>
                <th>L.p.</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <?php
    $conn = mysqli_connect('localhost', 'root', '', 'wedkowanie');
    $query = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;";
    $wynik = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_array($wynik)) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['nazwa']."</td>
                <td>".$row['wystepowanie']."</td>
              </tr>";
    }
    
    mysqli_close($conn);
?>
        </table>
    </div>

    <footer>
        <p>Stronę wykonał: Dawid</p>
    </footer>
</body>
</html>