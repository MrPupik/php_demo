<head>
        <?php include '../db.php' ?>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Abel">
        <title>Add Cashier To Shift</title>

</head>

<body>
        <div class='form-area'>
                <h3>Add Cashier To Shift:</h3>
                <form action="./post.php" method="post">
                        Choose Cashier: <select name="cashierNum" id="cashierNum">
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
                                        $option_name = "Shift #" . $row["ShiftNum"] . " at " . $row["ShiftDate"];
                                        $option_val = $row["ShiftNum"] . " " . $row["ShiftDate"];
                                        echo "<option value=\"" . $option_val . "\">" . $option_name . "</option>";
                                }
                                disconnect();
                                ?>
                        </select> <br /><br />
                        <div class="centering-div">
                                <button type="submit"> Add cashier to shift </button>
                        </div>
                </form>

        </div>
</body>