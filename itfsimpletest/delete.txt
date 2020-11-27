<?php
    $conn = mysqli_init();
    mysqli_real_connect($conn, 'ihost.it.kmitl.ac.th', 'it63070168', 'RJIgkx67', 'it63070168_testlab', 3306);

    if (mysqli_connect_errno($conn)) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    $ID = $_POST['ID'];

    $sql = "DELETE FROM product WHERE ID = '$ID'";

    if (mysqli_query($conn, $sql)) {
        echo 'Saved';
    } else {
        echo "Fail to load";
    }
?>
    <title>รายการสินค้า</title>
    <script>
        window.location.replace("show.php");
    </script>