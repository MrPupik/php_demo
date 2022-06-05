<head>
    <?php include '../db.php' ?>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">


</head>

<body>
    <?php
    echo "getting payment... <br/>";
    connect();
    $orders = SelectAllOrders();

    while ($row = mysqli_fetch_array($orders)) {
        echo ($row['Payment'] . "\n");
    }
    disconnect();



    ?>
</body>