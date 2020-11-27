<?php
  $conn = mysqli_init();
  mysqli_real_connect($conn, 'ihost.it.kmitl.ac.th', 'it63070168', 'RJIgkx67', 'it63070168_testlab', 3306);

  if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
  }
  $res = mysqli_query($conn, 'SELECT * FROM product');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>รายการสินค้า</title>
    <style>
      .card{
        margin-top: 2rem;
        margin-left: 4rem;
        margin-right: 4rem;
        border-radius: 20px;
        padding: 2rem 5rem 2rem;
        box-shadow: 0 20px 20px rgba(0, 0, 0, 0.2), 0px 0px 50px rgba(0, 0, 0, 0.2);
      }
    </style>
    <script>
      $(document).ready(function() {
        $('.deleteeiei').click(function() {
          $('#valID').val($(this).data('value'));
          $('#deleteaccept').modal('show');
        });
      });
</script>
</head>
<body>
  <div class="modal fade" id="deleteaccept" tabindex="-1" role="dialog" aria-labelledby="deleteacceptLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteacceptLabel">ลบข้อมูล</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center>
            <p align="center">ต้องการลบข้อมูลใช่ไหม?</p>
          </center>
          <form action="delete.php" method="post" id="DeleteForm">
            <input type="hidden" name="ID" id="valID" value="">
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" data-modal-action="yes" form="DeleteForm">ลบ</button>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <h1>รายการสินค้า</h1>
    <table class="table table-hover mb-3" border="1" id="data">
      <thead class="thead-dark">
        <tr id="row<?php echo $Result['ID']; ?>">
          <th width="150">
            <div align="center">ชื่อสินค้า</div>
          </th>
          <th width="150">
            <div align="center">ราคา</div>
          </th>
          <th width="150">
            <div align="center">ส่วนลด(%)</div>
          </th>
          <th width="150">
            <div align="center">รวม</div>
          </th>
          <th width="80">
            <div align="center">แก้ไข</div>
          </th>
          <th width="80">
            <div align="center">ลบ</div>
          </th>
        </tr>
      </thead>
      <?php
      while ($Result = mysqli_fetch_array($res)) {
      ?>
      <tbody>
          <tr>
            <td class="align-middle" width="150">
              <?php echo $Result['Product']; ?>
            </td>
            <td class="align-middle" width="150">
              <?php echo $Result['Price']; ?>
            </td>
            <td class="align-middle" width="150">
              <?php echo $Result['Discount']; ?>
            </td>
            <td class="align-middle" width="150">
              <?php echo $Result['Total']; ?>
            </td>
            <td width="80">
            <center>
                <form action="edit.php" method="post" id="updateForm">
                  <input type="hidden" name="iddd" id="iddddd" value="<?php echo $Result['ID']; ?>">
              </center>
              <button type="submit" class="btn btn-warning btn-block" id="edit<?php echo $Result['ID']; ?>">แก้ไข</button>
              </form>
            </td>
            <td width="80">
              <button type="button" class="btn btn-danger btn-block deleteeiei" data-toggle="modal" data-target="#deleteaccept" data-value="<?php echo $Result['ID']; ?>" id="del<?php echo $Result['ID']; ?>">ลบ</button>
            </td>
          </tr>
      </tbody>
      <?php
      } mysqli_close($conn);
      ?>
    </table>
    <a class="btn btn-success" href="./insert.html">เพิ่มข้อมูล</a>
  </div>
</body>
</html>