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
                <h3>Display order:</h3>
                <form action="./get.php" method="get">
                        Enter order number: <input type="text" placeholder="123" name="orderNum" id="orderNum">
                        </input> <br /><br />
                        <div class="centering-div">
                                <button type="submit"> Search order </button>
                        </div>
                </form>

        </div>
</body>