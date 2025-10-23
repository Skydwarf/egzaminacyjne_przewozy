<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Strona przewozowa</title>
</head>
<body>
    <header>
        <h1>Firma przewozowa Półdarmo</h1>
    </header>
    <nav>
        <a href="bd/kw1.png">kwerenda1</a>
        <a href="bd/kw2.png">kwerenda2</a>
        <a href="bd/kw3.png">kwerenda3</a>
        <a href="bd/kw4.png"">kwerenda4</a>
    </nav>
    <main>
        <article>
            <h2>Zadania do wykonania</h2>
            <table>
                <tr>
                    <th>Zadanie do wykonania</th>
                    <th>Data realizacji</th>
                    <th>Akcja</th>
                </tr>
                <?php
                    $polaczenie = mysqli_connect("localhost","root","","przewozy");
                    $zapytanie = "SELECT id_zadania,zadanie,data FROM zadania";
                    $kwerenda = mysqli_query($polaczenie,$zapytanie);
                    while(($wynik = mysqli_fetch_row($kwerenda)) != null){
                        echo("<tr>
                        <td>$wynik[1]</td>
                        <td>$wynik[2]</td>
                        <td>
                        <a href='przewozy.php' id=$wynik[0]>Usuń</a>
                        </td>
                        </tr>");
                    }
                ?>
            </table>
          
            <form method="post">
                <label for="zadanie">Zadanie do wykonania: </label>
                <input type="text" name="zadanie" id="zadanie"><br>
                <label for="data">Data realizacji: </label>
                <input type="date" name="data" id="data">
                <input type="submit" value="Dodaj">
            </form>
            <?php
                if (!empty($_POST['zadanie'])) {
                    $dodaj = "INSERT INTO zadania('zadanie', 'data', 'osoba_id') VALUES ('$_POST[zadanie]','$_POST[data]','1');";
                    echo($_POST['zadanie']);
                    echo($_POST['data']);
                    $dodajkwerenda = mysqli_query($polaczenie,$zapytanie);
                }
                mysqli_close($polaczenie);
            ?>
        </article>
        <aside>
            <img src="obrazy/auto.png" alt="auto firmowe">
            <h3>Nasza specjalność</h3>
            <ul>
                <li>Przeprowadzki</li>
                <li>Przewóz mebli</li>
                <li>Przesyłki gabarytowe</li>
                <li>Wynajem pojazdów</li>
                <li>Zakupy towarów</li>
            </ul>
        </aside>
    </main>
    <footer>
        <p>Stronę wykonał:</p>
    </footer>
</body>
</html>