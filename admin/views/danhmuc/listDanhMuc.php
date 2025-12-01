<!--header-->
<?php
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/navbar.php';
require_once __DIR__ . '/../layout/sidebar.php';
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý danh mục sản phẩm</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">


          <div class="card">
            <div class="card-header">
            <a href="<?= 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=form-them-danh-muc' ?>" class="nav-link">
                <button class="btn btn-success">Thêm danh mục</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                </tbody>
                <?php foreach ($listDanhMuc as $key => $danhMuc): ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $danhMuc['ten_danh_muc'] ?></td>
                    <td><?= $danhMuc['mo_ta'] ?></td>
                    <td>
                      <a href="<?= 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=form-sua-danh-muc&id_danh_muc=' .$danhMuc['id'] ?>">
                        <button class="btn btn-warning">Sua</button>
                      </a>
                      <a href="<?= 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=xoa-danh-muc&id_danh_muc=' .$danhMuc['id'] ?>" onclick="return confirm('Ban co dong y xoa khong')">
                        <button class="btn btn-warning">Xoa</button>
                      </a>
                      
                    
                    </td>

                  </tr>
                <?php endforeach ?>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--Footer-->
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
<!--endFooter-->

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

</body >
</html >