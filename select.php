<?php
    include("connessione.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $sql = "SELECT * FROM FILM";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            showTable($result);
        } else {
            showDataError();
        }

        function showTable($res){
            echo "<div class='divShowData'>";
                echo "<h1 class='correct'>FILM TROVATI</h1>";
                echo "<table>";
                    echo "<tr>";
                        echo "<th>CodFilm</th>";
                        echo "<th>Titolo</th>";
                        echo "<th>AnnoProduzione</th>";
                        echo "<th>Nazionalita</th>";
                        echo "<th>Regista</th>";
                        echo "<th>Genere</th>";
                    echo "</tr>";
                    while ($row = $res->fetch_assoc()) {  
                        echo "<tr>";
                            echo "<td>" . $row["CodFilm"] . "</td>";
                            echo "<td>" . $row["Titolo"] . "</td>";
                            echo "<td>" . $row["AnnoProduzione"] . "</td>";
                            echo "<td>" . $row["Nazionalita"] . "</td>";
                            echo "<td>" . $row["Regista"] . "</td>";
                            echo "<td>" . $row["Genere"] . "</td>";
                        echo "</tr>"; 
                    }
                echo "</table>";
            echo "</div>";
        }

        function showDataError(){
            echo "<div class='divShowData'>"; 
                echo "<h1 class='error'>FILM NOT FOUND</h1>";
            echo "</div>";
        }
    ?>
</body>
</html>