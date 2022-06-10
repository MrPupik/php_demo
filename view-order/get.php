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
            $on = $_GET["orderNum"];

            connect();
            $details = getOrder($on);
            if ($details) {
                echo "<u>Shift:</u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp #" . $details['ShiftNum'] . " at " . $details['ShiftDate'] .  "<br/><br/>" .
                    "<u>Cashier Name:</u> &nbsp &nbsp &nbsp &nbsp" . $details['Name'] . "<br/><br/>" .
                    "<u>Payment Method:</u> &nbsp &nbsp " . $details['Payment'] . "<br/><br/>" .
                    "<u>Courses:</u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp" . $details['dishes'] . "<br/><br/>" .
                    "<u>Total Price:</u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp" . $details['total'] . "<br/><br/>";
            } else {
                echo "<div class=\"centering-div\"><h3 style=\"color:rgb(233 129 129));align-self: center \"> Error getting this order from database  </h3></div> <br/><br/><br/><br/>";
                echo "<div class=\"centering-div\"><button onclick=\"history.go(-1);\">Try again </button></div>";
            }

            echo "<div class=\"centering-div\"><button onclick=\"history.go(-1);\">Back</button></div>";
            disconnect();
            ?>
        </div>
    </div>
</body>