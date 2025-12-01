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
          <h1>Quản lý danh sách thú cưng</h1>
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
            <a href="<?= 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=form-them-san-pham' ?>" class="nav-link">
                <button class="btn btn-success">Thêm thú cưng</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm </th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                </tbody>
                <?php foreach ($listSanPham as $key => $sanPham): ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $sanPham['ten_san_pham'] ?></td>
                    <td>
                      <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" style="100px" width="100px" onerror="this.onerror=null; this.src='https://www.bing.com/th/id/OIP.spCHi4tTc5cIA3F7sr9lHwAAAA?w=186&h=211&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2'" alt="">
                    </td>
                    <td><?= $sanPham['gia_san_pham'] ?></td>
                    <td><?= $sanPham['so_luong'] ?></td>
                    <td><?= $sanPham['ten_danh_muc'] ?></td>
                    <td><?= $sanPham['trang_thai'] == 1 ? 'Còn Bán':'Dừng bán'; ?></td>
                    <td>
                      <a href="<?= 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=form-sua-danh-muc&id_danh_muc=' .$sanPham['id'] ?>">
                        <button class="btn btn-warning">Sua</button>
                      </a>
                      <a href="<?= 'http://localhost/D%E1%BB%B1%20%C3%A1n%201/xuong-thu-cung1/admin/?act=xoa-danh-muc&id_danh_muc=' .$sanPham['id'] ?>" onclick="return confirm('Ban co dong y xoa khong')">
                        <button class="btn btn-warning">Xoa</button>
                      </a>
                      
                    
                    </td>

                  </tr>
                <?php endforeach ?>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm </th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
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