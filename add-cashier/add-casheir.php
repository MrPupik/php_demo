<head>
        <?php include '../db.php' ?>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">


</head>

<body>
        <div class='form-area'>
                <form action="" method="post">
                        Choose Cashier: <select name="Cashier number" id="cashierNum">
                                <?php
                                connect();
                                $allCashiers = GetCashierNums();
                                while ($row = mysqli_fetch_array($allCashiers)) {
                                        $num = $row["EmployeeNum"];
                                        echo "<option value=\"" . $num . "\">" . $num . "</option>";
                                }
                                disconnect();
                                ?>
                        </select> <br />
                        Choose Shift: <select name="shift" id="shift">
                                <?php
                                connect();
                                $shifts = GetShifts();
                                while ($row = mysqli_fetch_array($shifts)) {
                                        $s = "Shift #" . $row["ShiftNum"] . " at " . $row["ShiftDate"];
                                        echo "<option value=\"" . $s . "\">" . $s . "</option>";
                                }
                                disconnect();
                                ?>
                        </select> <br /><br />
                        <button type="submit">ADD</button>
                </form>

        </div>
</body>