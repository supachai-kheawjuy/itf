<?php
    $conn = mysqli_init();
    mysqli_real_connect($conn, 'ihost.it.kmitl.ac.th', 'it63070168', 'RJIgkx67', 'it63070168_testlab', 3306);

    if (mysqli_connect_errno($conn)) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
};

    $x = $_POST['name'];
    $y = $_POST['price'];
    $z = $_POST['discount'];
    $a = $y - ($y * ($z / 100));

    $sql = "INSERT INTO product (Product , Price , Discount , Total) VALUES ('$x', '$y', '$z', '$a')";

    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully"; 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
<titile>เพิ่มข้อมูล</titile>
<script>
    window.location.replace("show.php");
</script>