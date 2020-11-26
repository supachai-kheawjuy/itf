<?php
    $conn = mysqli_init();
    mysqli_real_connect($conn, 'ihost.it.kmitl.ac.th', 'it63070168', 'RJIgkx67', 'it63070168_itflab', 3306);

    if (mysqli_connect_errno($conn)) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
};

    $x = $_POST['in_a'];
    $y = $_POST['in_b'];
    $z = $x + $y;

    $sql = "INSERT INTO databaseeiei (A , B , C) VALUES ('$x', '$y', '$z')";

    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully"; 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
<script>
    window.location.replace("show.php");
</script>