<head>
    <?php include '../db.php'; ?>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
</head>

<body>
    <div class='form-area'>
        <div style="margin:10px; align-items: center;">
            <?php
            $cn = $_POST["cashierNum"];
            $arr = explode(' ', $_POST["shift"]);
            $sn = $arr[0];
            $sd = $arr[1];
            connect();
            if (!isInShift($cn, $sn, $sd)) {
                if (assginCashierToShift($cn, $sn, $sd)) {
                    $name = getCashierName($cn);
                    echo "<div class=\"centering-div\"><h3>" . $name . " (employee number " . $cn . ") added to shift #" . $sn . " at " . $sd . " as a cashier </h3></div> <br/><br/>";
                    echo "<div class=\"centering-div\"><button onclick=\"history.go(-1);\">Add another cashier </button></div>";
                } else {
                    echo "<h3>Error assigning cashier to shift</h3>";
                }
            } else {
                echo "<div class=\"centering-div\"><h3 style=\"color:rgb(233 129 129));align-self: center \"> This cashier is already on this shift  </h3></div> <br/><br/>";
                echo "<div class=\"centering-div\"><button onclick=\"history.go(-1);\">Try again </button></div>";
            }
            disconnect();
            ?>
        </div>
    </div>
</body>