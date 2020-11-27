<?php
    $conn = mysqli_init();
    mysqli_real_connect($conn, 'ihost.it.kmitl.ac.th', 'it63070168', 'RJIgkx67', 'it63070168_testlab', 3306);

    if (mysqli_connect_errno($conn)) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    $id = $_POST['id'];
    $x = $_POST['name'];
    $y = $_POST['price'];
    $z = $_POST['discount'];
    $a = $y - ($y * ($z / 100));
    
    $sql = "UPDATE product SET Product = '$x', Price = '$y', Discount = '$z', Total = '$a' WHERE ID = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo 'Saved';
    } else {
        echo "Fail to load";
    }
?>
    <title>แก้ไขข้อมูล</title>
    <script>
        window.location.replace("show.php");
    </script>