<head>
        <link rel="stylesheet" href="./shefa_design.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">

        
</head>
<body>
<?php
        echo "getting payment... <br/>";
        $conn=mysqli_connect('127.0.0.1', 'root', 'Pinpazil1','ChefExpress');
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              echo "Connected successfully <br/><br/>";
        $sql="select * from Orders"; 
        $rs=mysqli_query($conn,$sql);
        
        while($row = mysqli_fetch_array($rs))
        {
            echo  ($row['Payment']) . "<br/>";
        }
    ?>
</body>
