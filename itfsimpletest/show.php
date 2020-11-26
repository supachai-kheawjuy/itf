<?php
  $conn = mysqli_init();
  mysqli_real_connect($conn, 'ihost.it.kmitl.ac.th', 'it63070168', 'RJIgkx67', 'it63070168_itflab', 3306);

  if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOW</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>A</th>
                <th>B</th>
                <th>C</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $res = mysqli_query($conn, 'SELECT * FROM databaseeiei');
        while ($Result = mysqli_fetch_array($res)) {
        ?>
          <tr id="row<?php echo $Result['ID']; ?>">
            <td class="align-middle" width="100">
              <?php echo $Result['A']; ?>
            </td>
            <td class="align-middle" width="350">
              <?php echo $Result['B']; ?>
            </td>
            <td class="align-middle" width="150">
              <?php echo $Result['C']; ?>
            </td>
          </tr>
            <?php
        } mysqli_close($conn);
        ?>
        </tbody>
    </table>
</body>
</html>