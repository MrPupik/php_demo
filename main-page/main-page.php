<head>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong|Abel">
    <?php include '../db.php' ?>


</head>

<body class="mainContainer">



    <div class="mainStrip">

        <div class="title">
            <h2 class="font-effect-shadow-multiple" style="font-family: Sofia; margin-top: 0px; margin-bottom: 5px;">ShefA</h2>
            <p style="margin-top: 0px; margin-bottom: 10px; font-family:Abel; ">resturant with style</p>
        </div>

        <div class="photoContainer">

            <?php
            $images = array(
                "https://cdn.pixabay.com/photo/2014/10/19/20/59/hamburger-494706_1280.jpg",
                "https://cdn.pixabay.com/photo/2014/11/05/15/57/salmon-518032_1280.jpg",
                "https://cdn.pixabay.com/photo/2016/11/23/18/31/pasta-1854245_1280.jpg"
            );
            for ($i = 0; $i < 3; $i++) {
                echo "<img class=\"coverPhoto\" src=" . "\"" . $images[$i] . "\"" . "alt=\"yummy\">";
            }

            ?>

        </div>
    </div>

    <div class="tableContainer">

        <h3>Shift cashiers status:</h3>

        <table>
            <tr>
                <th>Shift Number</th>
                <th>Shift Date</th>
                <th>Actual number of cashiers</th>
                <th>Needed number of cashiers</th>
                <th>Diffreance</td>
            </tr>
            <?php
            connect();
            $rs = shiftAnalysis();
            while ($row = mysqli_fetch_array($rs)) {
                echo "<tr> " .
                    "<td>" . $row["ShiftNum"] . "</td>" .
                    "<td>" . $row["ShiftDate"] . "</td>" .
                    "<td>" . $row["Actual"] . "</td>" .
                    "<td>" . $row["shouldBe"] . "</td>" .
                    "<td>" . $row["Difference"] . "</td>" .
                    "</tr>";
            }
            disconnect();
            ?>
        </table>
    </div>

    </div>
</body>